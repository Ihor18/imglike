function StorageItemFromJson(js) {
    var result = new StorageItem()

    if (typeof js._type  != 'undefined') {
      let jsObj = null;
      jsObj = eval('new '+js._type +'()');

      Object.assign(jsObj,js.value);

      js.value = jsObj
    }

    Object.assign(result,js);
    result.createdAt = new Date(js.createdAt)
    return result;
  } 

function parsePostIgData(raw) {
      let item = raw.node;

      // clue text 
      let captionText = '';
      for (var cid in item.edge_media_to_caption.edges) {
        captionText += item.edge_media_to_caption.edges[cid].node.text
      }

      

      let result = {
        id: item.id,
        shortcode: item.shortcode,
        created_at: item.taken_at_timestamp,
        is_video: item.is_video,
        numbers: {
          likes : item.edge_media_preview_like.count,
          comments: item.edge_media_to_comment.count
        },
        image: item.display_url,
        image_thumb: item.thumbnail_resources[2].src,
        caption: captionText,
      };


      if (item.is_video) {
        result.numbers['views'] = item.video_view_count;
        console.warn(item)
      }

      return result;
}


class StorageItem {

    constructor(existFlag, val, expireSec) {
      if (typeof val != 'undefined') {
        this._type = val.constructor.name
      }

      this.exist = existFlag;
      this.value = val
      this.expiry = expireSec
      this.createdAt = new Date()
    }

    expired() {
      if (!this.exists()) {
        return true;
      }

      let secDiff = Math.round(((new Date()).getTime() - this.createdAt.getTime())/1000);  
      return secDiff > this.expiry;
    }

    exists() {
      return this.exist;
    }

    data() {
      if (this.exists()) {
        return this.value
      } else {
        console.warn('trying to get non existing storage item')
        return null;
      }
    }

}

class DataStorage {

    set(key,data,expire = 300) {
      let itemToPut = new StorageItem(true,data,expire); 
      localStorage.setItem(key,JSON.stringify(itemToPut))
      return $.when();
    }

    get(key,constructor,expiryForConstructor = 300) {
      let val = localStorage.getItem(key)
      let result = null;
      if (val != null) {
        result = StorageItemFromJson(JSON.parse(val))
      }
      if (val != null && !result.expired()) {
        return $.when(result.data());
      } else {

        if (typeof constructor != 'undefined') {
          // 
          try {
            let that = this;
            return constructor().then(function(data){
              console.log('setting constructor generated data for key `'+key+'`')
              that.set(key,data,expiryForConstructor)
              return data
            })  
          } catch (constructError) {
            console.error('error constructing data for empty cache entry',constructError);
          }
        } else {
          return $.when(new StorageItem(false));
        }
      }
    }
}

var Storage = new DataStorage();

class Profile {

    constructor(existsFlag,data) {
      this.exists = existsFlag
      this.data = data;
    }

    exists() {
      return this.exists
    }

    data() {
      return this.data;
    }

    convertIgResponseToProfile(raw) {

      let userRaw = raw.graphql.user

      return new Profile(true,{
        // raw: raw,
        incomplete: false,
        id: userRaw.id,
        verified: userRaw.is_verified,
        is_private: userRaw.is_private,
        profile_pic: userRaw.profile_pic_url_hd,
        bio : userRaw.biography,
        name : userRaw.full_name,
        username: userRaw.username,
        numbers: {
          posts: userRaw.edge_owner_to_timeline_media.count,
          follows: userRaw.edge_follow.count,
          followers: userRaw.edge_followed_by.count,
        }  
      })
    }

    actualizeData() {

      var that = this;

      return $.getJSON('https://www.instagram.com/'+that.data.username+'/?__a=1').fail(function(err){
          console.error("got exception while actualizing profile data", err)
      }).then(function(data){
        const obj = that.convertIgResponseToProfile(data)
        console.log('need to actualize data for `'+that.data.username+"`");
        // Storage.set(cacheKey,obj);
          return obj
        });
    }

    
    getActiveStories() {

      var that = this;
      var key = 'pastories_'+that.data.id;

      return Storage.get(key,function(){
          return $.getJSON('https://www.instagram.com/graphql/query/?query_hash=7c16654f22c819fb63d1183034a5162f&variables=%7B"user_id"%3A"'+that.data.id+'"%2C"include_chaining"%3Afalse%2C"include_reel"%3Afalse%2C"include_suggested_users"%3Afalse%2C"include_logged_out_extras"%3Afalse%2C"include_highlight_reels"%3Atrue%7D')
          .then(function(data){
            
            console.log('stories ',data)

            // let u = data.data.user
            // let um = u.edge_owner_to_timeline_media;

            // let postsData = [];

            // for (var idx in um.edges) {
            //  postsData.unshift(that.parsePostIgData(um.edges[idx]));
            // }

            // return postsData;
          });
      },60);
    }
    getSavedStories() {

      var that = this;
      var key = 'psaved_'+that.data.id;

      return Storage.get(key,function(){
          return $.getJSON('https://www.instagram.com/graphql/query/?query_hash=d4d88dc1500312af6f937f7b804c68c3&variables=%7B"user_id"%3A"'+that.data.id+'"%2C"include_chaining"%3Afalse%2C"include_reel"%3Afalse%2C"include_suggested_users"%3Afalse%2C"include_logged_out_extras"%3Atrue%2C"include_highlight_reels"%3Atrue%2C"include_live_status"%3Atrue%7D')
          .then(function(data){
            
            console.log('saved stories ',data)

            // let u = data.data.user
            // let um = u.edge_owner_to_timeline_media;

            // let postsData = [];

            // for (var idx in um.edges) {
            //  postsData.unshift(that.parsePostIgData(um.edges[idx]));
            // }

            // return postsData;
          });
      },600);
      
    }

    getPosts(cached = 86400) {

      var that = this;
      var key = 'pp_'+that.data.id;

      return Storage.get(key,function(){
          return $.getJSON('https://www.instagram.com/graphql/query/?query_hash=42323d64886122307be10013ad2dcc44&variables=%7B"id"%3A"'+that.data.id+'"%2C"first"%3A48%2C"after"%3A""%7D')
          .then(function(data){
            
            let u = data.data.user
            let um = u.edge_owner_to_timeline_media;

            let postsData = [];
            
            um.edges.reverse()
            for (var idx in um.edges) {
              postsData.push(parsePostIgData(um.edges[idx]));
            }

            return postsData;
          });
      },cached);
      
    }

} 


class Instagrammer {

    constructor() {
    }

    convertIgSearchToProfile(userRaw) {
      return new Profile(true,{
        // raw: raw,
        incomplete: true,
        id: userRaw.pk,
        verified: userRaw.is_verified,
        is_private: userRaw.is_private,
        profile_pic: userRaw.profile_pic_url,
        bio : null,
        name : userRaw.full_name,
        username: userRaw.username,
        numbers: null
      });
    }

      getPostInfo(shortcode) {

      let cacheKey = 'post_'+shortcode;
        let that = this;

        return Storage.get(cacheKey,() => {
          return $.getJSON('https://www.instagram.com/graphql/query/?query_hash=55a3c4bad29e4e20c20ff4cdfd80f5b4&variables={%22shortcode%22:%22'+shortcode+'%22}').then((d) => {

            let item = d.data.shortcode_media;
            let result = {};

            console.warn('edge_sidecar_to_children => for `'+cacheKey+'`',d)

            if (item.edge_sidecar_to_children && item.edge_sidecar_to_children.edges.length > 0) {
              result.has_slides = true;

              let children = [];

              for (var sidx in item.edge_sidecar_to_children.edges) {
                children.push(parsePostIgData(item.edge_sidecar_to_children.edges[sidx]))
              }

              result.children = children;
            }

            result.location = item.location;

              return result;
          });
        },1800)

      }

      getProfileByNick(name) {
        let cacheKey = 'profile_'+name;
        let that = this;

        return Storage.get(cacheKey,function() {

          return $.getJSON('https://www.instagram.com/web/search/topsearch/?query='+name).then(function(data){

          for (var idx in data.users) {
            let userCurrent = data.users[idx].user
            if (userCurrent.username === name) {
              let obj = that.convertIgSearchToProfile(userCurrent);
              Storage.set(cacheKey,obj); 
              obj.actualizeData();
              return obj;
            }
          }

          return new Profile(false); 
          });

        });
      }
    
}

let ig = new Instagrammer();




ig.getProfileByNick('fastwind18').fail((failed) => {
  console.warn('failed profile',failed)
}).then((profile) => {

  var user = {
    "id":"8182184528",
    "verified":false,
    "profile_pic":"https://instagram.fiev5-1.fna.fbcdn.net/v/t51.2885-19/s320x320/67309608_404480307087316_8098446220004950016_n.jpg?_nc_ht=instagram.fiev5-1.fna.fbcdn.net&_nc_ohc=No8j0dUk8cgAX_upsSI&tp=1&oh=18d5bd7a1912dda7d187d1b9d1fc5416&oe=5FF3B235",
    "bio":"Shatsk\n27y.o",
    "name":"serhii",
    "username":"fastwind18",
    "numbers":{"posts":54,"follows":268,"followers":267} 
  };

  // console.log(profile.data, user);

  

  $('.user-info .container').tmpl('user', user);
  // 

  profile.getPosts().then((postsData) => {
    // $.each(postsData,(i,e) => {
      
    //   $('.posts').append('<img class="post" data-id="'+e.shortcode+'" src='+e.image_thumb+'>');
    // });
    var user_data = {};
    user_data.posts = postsData;
    $('.user-content .tab-content').tmpl('user_data', user_data);
    
  });
  // $('.user-content .tab-content').tmpl('user_data', postsData);

  // profile.getSavedStories().then(function(data){
  //  console.log('stories => ',data)
  // });

});

$(document).on('click','.post',()=>{

  let shortcode = $(this).data('id');

  console.warn(' going to get a post extra data for '+shortcode )
  // if (shortcode != '') {
  //  ig.getPostInfo(shortcode).then((data) => {
  //    console.log('extra info on this post => ', data);
  //  }).fail((err) => {
  //    console.error('got an error getting extra info on post ',err)
  //  })
  // }
});