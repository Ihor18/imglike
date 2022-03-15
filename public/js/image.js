let fileLs = [];
let rotateLs = [];
let resp = [];
let cropper;
let cropImageType;
let format;
let canvas;
let ctx;


let dropArea = document.getElementsByClassName('upload-place')[0]
if (dropArea) {
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false)
    })

    ;['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false)
    })
    ;['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false)
    })
    dropArea.addEventListener('drop', handleDrop, false)

}

function highlight(e) {
    dropArea.classList.add('highlight')
}

function unhighlight(e) {
    dropArea.classList.remove('highlight')
}

function mobileBtnClick() {
    document.getElementById('file_input_id').click()
}

function preventDefaults(e) {
    e.preventDefault()
    e.stopPropagation()
}

async function handleDrop(e) {
    try {
        let dt = await e.dataTransfer
        let files = await dt.files;
        refresh(files);
    } catch (err) {
        alert(localize['handleDropError'][currentLang])
        location.reload()
    }
}

function handleFiles(files) {
    files = [...files]
    files.forEach((file) => {
        fileLs[file.name] = file

    })
    // fileLs = files
    files.forEach(previewFile)
    loaderStop()
}

function previewFile(file) {

    let reader = new FileReader()
    reader.readAsDataURL(file)
    let fileName = file.name.split('.')[0]
    reader.onloadend = function () {
        let cart = document.createElement('div')
        cart.className = 'cart-image'
        cart.setAttribute('id', fileName)

        document.getElementsByClassName('list')[0].appendChild(cart)

        let imageBlock = document.createElement('div')
        imageBlock.className = 'image'

        let wrpImg = document.createElement('div')
        wrpImg.className = 'wrp-img'

        let reloadBtn = document.createElement('button')
        reloadBtn.className = 'reload'
        reloadBtn.setAttribute('image', fileName)
        reloadBtn.setAttribute('onclick', "rotateImg(" + '"' + fileName + '"' + ")")

        let deleteBtn = document.createElement('button')
        deleteBtn.className = 'delete'
        deleteBtn.setAttribute('image', fileName)
        deleteBtn.setAttribute('onclick', "deleteImg(" + '"' + fileName + '"' + ")")

        wrpImg.appendChild(reloadBtn)
        wrpImg.appendChild(deleteBtn)

        let img = document.createElement('img')
        img.src = reader.result
        wrpImg.appendChild(img)

        imageBlock.appendChild(wrpImg)
        cart.appendChild(imageBlock)

        let blockName = document.createElement('span')
        blockName.textContent = fileName
        cart.appendChild(blockName)

    }
}


function refresh(files) {

    $('.upload-buttons')[0].style.display = 'none'
    $('.safe-transfer')[0].style.display = 'none'
    switch (location.pathname.substr(1)) {
        case 'en/resize':
        case 'resize':
            createBtn("resizeImage()", 'tool-button', "../img/icon-resize.svg", localize['changeSize'][currentLang])
            createUploadField()
            handleFiles(files)
            break;
        case 'en/compress':
        case 'compress' :
            console.log(1)
            compress()
            createUploadField()
            handleFiles(files)
            break;
        case 'en/rotate':
        case 'rotate':
            rotate();
            createUploadField()
            handleFiles(files)
            break;
        case 'en/crop':
        case 'crop':
            cropImageType = files[0].type
            enableCrop()
            previewImage(files)
            break;
        case 'en/watermark':
        case 'watermark' :
            carousel(files)
            break;
        case 'en/convert-in-jpg':
        case 'convert-in-jpg':
            createBtn("convertToJpeg()", 'tool-button', "../img/icon-convert.svg", localize['convert'][currentLang] + ' ' + localize['in'][currentLang] + ' ' + "JPG")
            createUploadField()
            handleFiles(files)
            break;
        case 'en/convert-from-jpg':
        case 'convert-from-jpg' :
            createBtn("convertFromJpeg()", 'tool-button', "../img/icon-convert.svg", localize['convert'][currentLang] + ' ' + localize['from'][currentLang] + ' ' + "JPG")
            createUploadField()
            handleFiles(files)
            break;
        case 'en/meme-generator':
        case 'meme-generator':
            meme(files[0])
            document.getElementsByClassName('capt')[0].innerHTML = localize['convert_from_capt'][currentLang];
            createBtn("convertCanvasToImage()", 'tool-button', "../img/icon-mem.svg", localize['generate_meme'][currentLang], false)
            break;
    }

}

function previewImage(files) {

    files = [...files]
    files.forEach((file) => {
        fileLs[file.name] = file
    })

    let file = files[0]

    let reader = new FileReader()
    reader.readAsDataURL(file)

    let fileName = file.name.split('.')[0]


    reader.onloadend = function () {
        var elm = document.createElement('div');
        elm.className = 'wrap-content';
        document.getElementsByClassName('content')[0].classList.remove("white")
        let cart = document.createElement('div')
        cart.className = 'crop-area'
        cart.setAttribute('id', fileName)
        var img = document.createElement('img')
        img.src = reader.result
        img.id = "image"
        cart.appendChild(img)
        elm.appendChild(cart)
        $('.container')[2].appendChild(elm)

        var $image = $("#image")[0]

        cropper = new Cropper($image, {
            zoomable: false,
            zoomOnTouch: false,
            zoomOnWheel: false,
            background: false,
            dragMode: 'move',

        });
    }
    loaderStop()
}


function compress() {
    document.getElementsByClassName('capt')[0].innerHTML = localize['changed_capt'][currentLang];

    createBtn("sendRequest()", 'tool-button', "../img/vector-icon.svg", localize['compress'][currentLang]+' '+localize['image'][currentLang])
}


function enableCrop() {
    $('.btn-settings')[0].style.display = 'block'
    $('.tool-button')[0].style.display = 'block'
    $('.wrap-content').remove()
}

function createUploadField() {
    $('.wrp-settings')[0].style.display = "block"
    var elm = document.createElement('div');
    elm.className = 'wrap-content';

    var load = document.getElementById('load');
    load.insertBefore(elm, load.firstChild);

    var innerEl = document.createElement('div');
    innerEl.className = 'list flex jcc';
    elm.appendChild(innerEl);

    document.getElementsByClassName('content')[0].classList.remove("white")
}

function rotateImg(key) {
    let cart = document.getElementById(key)
    let node = cart.firstChild.firstChild
    if (node.lastChild.style.transform) {
        let num = parseInt(node.lastChild.style.transform.split('(')[1].split('d')[0]) + 90
        node.lastChild.style.transform = "rotate(" + num % 360 + "deg)"
        rotateLs[key] = num
    } else {
        node.lastChild.style.transform = "rotate(90deg)"
        rotateLs[key] = 90
    }
}

function deleteImg(key) {
    delete fileLs[key]
    let cart = document.getElementById(key)
    cart.remove()
}

function sendRequest() {
    let url = '/compress-image'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);

    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }
    let callback = function () {
        let elem = document.createElement('div')
        elem.className = "capt"
        let oldSize = (resp['old-size'] / 1000000).toFixed(2)
        let newSize = (resp['new-size'] / 1000000).toFixed(2)
        let compressResult = Math.round(100 - (newSize / oldSize * 100))
        if (oldSize / newSize > 1) {
            elem.innerHTML = localize['reduce_by'][currentLang]+" " + compressResult + "%<br>" + oldSize + "MB > " +
                newSize + "MB"
        }
        $('.container')[1].appendChild(elem)
        delete resp['old-size']
        delete resp['new-size']
        afterSend()
    }
    let text = localize['compress_capt'][currentLang]
    let failMessage = localize['extension_error'][currentLang]
    sendData(url, formData, callback, text, failMessage)
}

function load() {
    loaderPlay()
    for (img in resp) {
        var a = document.createElement('a');
        a.href = 'data:image/' + img.split('.')[img.split('.').length - 1] + ';base64,' + resp[img];
        a.download = img;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }
    loaderStop()
}

function createBtn(func, className, src, title, isChange = true) {
    let container = document.getElementsByClassName('container')[1]
    let compressBtn = document.createElement('button')
    compressBtn.type = 'submit'
    compressBtn.setAttribute("onclick", func)
    compressBtn.className = className

    if (isChange) {
        const owl = document.querySelector('div.wrap-content');
        owl.style.display = 'none'
    }
    let btnIcon = document.createElement('img')
    btnIcon.src = src

    let btnText = document.createElement('span')
    btnText.textContent = title

    compressBtn.appendChild(btnIcon)
    compressBtn.appendChild(btnText)
    container.appendChild(compressBtn)
}

function resizeImage() {
    loaderPlay()
    let pop_up = $('.wrp-settings')[0]
    let isPixel = document.querySelector('[data-tab = "tab-pixel"]').classList.contains("active")
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let formData = new FormData()
    formData.append('_token', csrf);

    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }

    if (isPixel) {
        formData.append('widthPx', document.querySelector('[name = "widthPx"]').value)
        formData.append('heightPx', document.querySelector('[name = "heightPx"]').value)
    } else {
        formData.append('reduce', document.querySelector('input[name="item-2"]:checked').value)
    }
    pop_up.classList.remove('active')
    pop_up.style.display = 'none'

    let text = localize['convert_from_capt'][currentLang]
    let failMessage =  localize['extension_error'][currentLang]

    sendData('resize-image', formData, afterSend, text, failMessage)

    loaderStop()
}

function lockInput(val) {
    document.querySelector('[name = "heightPx"]').disabled = !!val;
}

function trackInput(val) {

    checkbox1 = document.querySelector('[name = "save-prop"]').checked
    checkbox2 = document.querySelector('[name = "not-scale"]').checked
    if (checkbox1) {
        document.querySelector('[name = "heightPx"]').value = val * document.querySelector('[name = "heightPx"]').value / document.querySelector('[name = "widthPx"]').getAttribute('old-val')
    }
    document.querySelector('[name = "widthPx"]').setAttribute('old-val', val)
}

async function sendData(url, formData, callback, text, failMessage) {
    loaderPlay()
    await fetch(url, {
        method: 'POST',
        body: formData
    }).then(response => response = response.json())
        .then(data => resp = data).then(() => {

            if (resp.hasOwnProperty('errors') && resp.errors.file) {
                renewUploadPlace(text)
                alert(failMessage)
            } else if (resp.hasOwnProperty('errors') && resp.errors.url) {
                renewHTML(text)
                alert(failMessage)
            } else if (resp.hasOwnProperty('errors') && resp.errors.field) {
                loaderStop()
                alert(failMessage)
            } else {
                $('.safe-transfer')[0].style.display = "none"
                callback && callback()
            }

        })
    loaderStop()
}

function rotate() {
    createBtn("rotateImage()", 'tool-button', "../img/icon-rotate.svg", localize['rotate'][currentLang])
    document.body.getElementsByClassName('btn-settings')[0].classList.remove('disabled')
}

function rotateImage() {
    let url = '/rotate-image'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);

    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }


    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }

    sendData(url, formData)
    $('.btn-settings')[0].style.display = "none"
    $('.wrp-settings')[0].classList.remove('active')
    afterSend()
    loaderStop()
}

function afterSend() {
    $('.wrap-content')[0].style.display = "none"
    $('.wrap-content')[2].style.display = "block"
    $('.tool-button')[0].style.display = "none"
}

function rotateDeg(degree) {
    let carts = document.getElementsByClassName("cart-image")

    for (let item of carts) {
        let node = item.firstChild
        if (node.lastChild.style.transform) {
            let num = parseInt(node.lastChild.style.transform.split('(')[1].split('d')[0]) + degree
            node.lastChild.style.transform = "rotate(" + num % 360 + "deg)"
            rotateLs[item.id] = num
        } else {
            node.lastChild.style.transform = "rotate(" + degree + "deg)"
            rotateLs[item.id] = 90
        }
    }

}

function reset() {
    let carts = document.getElementsByClassName("cart-image")

    rotateLs = []
    for (let item of carts) {
        let node = item.firstChild
        node.lastChild.style.transform = null
    }
}

function toggle(obj) {
    if (!obj.classList.contains('disabled')) {
        $('.wrp-settings').toggleClass('active');
    }
}

function crop() {

    cropper.getCroppedCanvas().toBlob((blob) => {
        loaderPlay()
        let reader = new FileReader();
        reader.readAsDataURL(blob);
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = Object.keys(fileLs)[0];
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        loaderStop()
    }, cropImageType)
}

function changeCropperBox() {
    let left, top, width, height

    left = parseInt($("input[name='x']")[0].value)
    top = parseInt($("input[name='y']")[0].value)
    width = parseInt($("input[name='width']")[0].value)
    height = parseInt($("input[name='height']")[0].value)

    cropper.setCropBoxData({"left": left, "top": top, "width": width, "height": height})

}

function loaderPlay() {
    $('.loader')[0].style.display = "block"
}

function loaderStop() {
    $('.loader')[0].style.display = "none"
}

function htmlToImage() {
    format = $('#format').find(":selected")[0].value

    let url = '/convert-html'
    let data = []

    data['height'] = 1080
    data['width'] = 1920
    data['full-page'] = true
    data['format'] = 'png';
    data['url'] = $('[name="url"]')[0].value

    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);
    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }

    callback = function () {
        document.getElementsByClassName('capt')[0].innerHTML = localize['convert_from_capt'][currentLang];
        createBtn("convertHtml()", 'tool-button', "../img/icon-html.svg", localize['convert'][currentLang]+" HTML")
        let main = document.createElement('div')
        main.className = 'wrap-content'
        let block = document.createElement('div')
        block.className = 'html-area'
        let image = document.createElement('img')
        for (img in resp) {
            image.src = 'data:image/' + img.split('.')[img.split('.').length - 1] + ';base64,' + resp[img];
        }
        block.appendChild(image)
        main.appendChild(block)
        $('.container')[2].appendChild(main)
        $('.wrp-settings')[0].style.display = 'block'
    }

    sendData(url, formData, callback, localize['convert_web_pages'][currentLang], localize['enter_correct'][currentLang]+' url')

}

function convertHtml() {
    format = $('#format').find(":selected")[0].value

    let url = '/convert-html'
    let sizeSelector = $('#size').find(":selected")[0];
    let data = []

    data['height'] = sizeSelector.dataset.height
    data['width'] = sizeSelector.dataset.width
    data['format'] = format;
    data['url'] = $('[name="url"]')[0].value
    data['add-block'] = $('[name="add-block"]')[0].checked
    data['pop-up'] = $('[name="delete-pop-up"]')[0].checked
    data['full-page'] = $('[name="full-page"]')[0].checked

    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);
    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }

    sendData(url, formData, load, localize['convert_web_pages'][currentLang], localize['enter_correct'][currentLang]+' url')
}

function enterURL(value) {
    let inp = $('[name="url"]')
    for (let num = 0; num < inp.length; num++) {
        inp[num].value = value
    }
}

function clearField(selector, value) {
    let str = "[" + selector + '="' + value + '"]'
    let inputs = $(str.toString())
    for (num in inputs) {
        inputs[num].value = ''
    }
}

function carousel(files) {

    $('.upload-place')[0].style.display = 'none'
    $('.content').removeClass('white')
    files = [...files]

    let iteration = 0;
    let slider = $('.slider')[0]

    files.forEach((file) => {
        fileLs[file.name] = file
        iteration++;
        let reader = new FileReader()
        reader.readAsDataURL(file)

        let element = document.createElement('li')
        let img = document.createElement('img')
        reader.onloadend = function () {
            img.className = 'watermark-image'
            img.src = reader.result
        }
        element.appendChild(img)
        slider.appendChild(element)
    })

    let keys = Object.keys(fileLs)
    console.log(keys)
    slider.className += ' cust_active'
    $('.wrp-settings')[0].style.display = 'block'
    setTimeout(function () {
        $('.slider').slick({
            dots: true,
            prevArrow: '<a class="slick-prev slick-arrow slide left" href="#"><img src="images/slide-left.svg"></a>',
            nextArrow: '<a class="slick-next slick-arrow slide right" href="#" ><img src="images/slide-right.svg"></a>',
            customPaging: function (slick, index) {
                let targetImage = slick.$slides.eq(index).find('img').attr('src');
                let nameImage = keys.shift()

                return '<div class="image"><div class="wrp-img"><img src=" ' + targetImage + ' "/></div></div><span>' + nameImage + '</span>';
            }
        })

        $('li[role = "presentation"]').addClass('cart-image')

        let preview = $('.slick-dots')

        preview.addClass('list flex jcc')
        $('.watermark-area')[0].style.display = 'block'
        let hint = document.createElement('div')
        hint.className = 'hint'
        hint.innerHTML = localize['watermark_apply'][currentLang]
        $('.slider')[0].insertBefore(hint, preview[0])

        setTimeout(function () {
            let height = $('.slick-active > img')[0].height
            $('.slide.right')[0].style.top = height / 2 + 'px'
            $('.slide.left')[0].style.top = height / 2 + 'px'
            $('.slick-slide').css('height', height)
            $('.watermark-area').append($('.slick-dots')[0])
        }, 10)
        loaderStop()
    }, 40 * iteration)

}

function uploadWatermarkPreview() {
    $('#watermark_file').click()
    showWatermarkOptions(false)
}

function watermarkConvert() {
    let url = '/make-watermark'
    let data = []
    let option = $('#position_mark>option:selected')
    let text = $('#text-input')
    let file = $('#watermark_file')[0]
    text.css('display') === 'block' ? data['text'] = $('[name="watermark"]').val() : ''

    $('#font-size').css('display') === 'flex' ? data['font-size'] = $('[name="font-size"]').val() : ''

    $('#angle').css('display') === 'flex' ? data['angle'] = $('[name="angle"]').val() : ''

    file.files.length > 0 ? data['watermark_file'] = file.files[0] : ''

    data['position_mark'] = $('#position_mark').val()
    data['position_align'] = option.data('align')
    data['position_valign'] = option.data('valign')
    data['position_x'] = $('[name="x-value"]').val()
    data['position_y'] = $('[name="y-value"]').val()

    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }
    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }
    let text1 = localize['convert_from_capt'][currentLang]
    let failMessage = localize['not_empty_field'][currentLang]
    sendData(url, formData, function () {
        $('.wrap-content')[0].style.display = "none"
        $('.wrap-content')[1].style.display = "block"
        $('.tool-button')[0].style.display = "none"
        $('.btn-settings')[0].style.display = "none"
        $('.wrp-settings')[0].classList.remove('active')
    },text1,failMessage)
}


function showWatermarkOptions(isText) {
    if (isText) {
        $('#text-input').css('display', 'block')
        $('#font-size').css('display', 'flex')
        $('#angle').css('display', 'flex')
    }
    $('#watermark-options').css('display', 'block')
    $('.tool-button').css('display', 'block')
    $('.btn-grey').css('display', 'none')
    $('.bottom-btn').css('display', 'flex')
}

function fileClick() {
    $('#file_input_id').click()
}

function convertToJpeg() {
    let url = '/convert-to'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);

    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }


    sendData(url, formData)
    afterSend()
}

function convertFromJpeg() {
    let url = '/convert-from'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let data = []

    if ($('.item.active').data('tab') === 'tab-png') {
        data['format'] = 'png'
    } else {
        data['format'] = 'gif'
        data['type'] = $('input[name="item-2"]:checked').data('type')
        data['duration'] = $('input[name="duration"]').val()
        data['save_prop'] = $('input[name="item-1"]:checked').length > 0
    }

    formData.append('_token', csrf);

    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }
    let text = localize['convert_web_pages'][currentLang]
    let failMessage = localize['incorrect_data1'][currentLang]
    sendData(url, formData, afterSend, text, failMessage)

    $('.wrp-settings')[0].classList.remove('active')
    $('.btn-settings')[0].style.display = 'none';
}

function meme(file) {
    let reader = new FileReader()
    reader.readAsDataURL(file)
    reader.onloadend = function () {
        meme_preview(reader.result)
    }
}

function meme_preview(src) {
    $('.content').removeClass('white')
    $('.wrp-settings')[0].style.display = 'block'
    $('.upload-place')[0].style.display = 'none'
    $('.upload-buttons')[0].style.display = 'none'
    $('.safe-transfer')[0].style.display = 'none'
    let buttons = $('.btns')[0];

    let outerDiv = document.createElement('div')
    outerDiv.className = 'mem-area'
    let innerDiv = document.createElement('div')
    innerDiv.className = 'edit-panel flex jcc'
    innerDiv.append(buttons)
    buttons.style.display = 'flex'
    outerDiv.append(innerDiv)
    $('.wrap-content')[0].append(outerDiv)
    canvas = document.createElement('canvas')
    canvas.id = 'canvas-img'
    ctx = canvas.getContext('2d');
    outerDiv.append(canvas)
    handleImage(src)
}

function DrawOverlay(img) {
    ctx.drawImage(img, 0, 0);
    ctx.fillStyle = 'rgba(30, 144, 255, 0.4)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function handleImage(source) {
    let img = new Image();
    img.onload = function () {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0);
    }
    img.src = source;

    canvas.classList.add("canvas-show");
    DrawOverlay(img);

    loaderStop()
}

async function convertCanvasToImage() {
    let content = $('.ck-content').children();
    let coef = $('canvas')[0].height / $('canvas')[0].clientHeight
    let coordinates;
    for (var i = 1; i < content.length; i++) {
        let canv = canvas.getContext('2d');
        coordinates = content[i].getBoundingClientRect()
        canv.font = 16 * coef + 'px sans-serif'
        canv.fillText(content[i].innerHTML, coef * (coordinates.x - 45), coef * (coordinates.y - 470))
    }
    var link = document.createElement('a');
    link.download = 'mem.png';
    link.href = document.getElementById('canvas-img').toDataURL()
    link.click();
}

function chooseCanvas(id) {
    $('.pop-up').removeClass('md-show')
    let src = $('div.image').children("img").show()[id].src
    meme_preview(src)
}

function createInput() {
    $('.wrp-settings')[0].classList.remove('active')
    let textArea = document.createElement('div')
    textArea.className = 'canvasInput'
    textArea.style.width = canvas.clientWidth + 'px'
    textArea.style.height = canvas.clientHeight + 'px'


    textArea.style.maxHeight = canvas.clientHeight + 'px'
    let innerArea = document.createElement('div')
    textArea.append(innerArea)

    const watchdog = new CKSource.EditorWatchdog();

    window.watchdog = watchdog;
    watchdog.setCreator((element, config) => {
        config.height = 500
        config.format_tags = 'p;pre';
        return CKSource.Editor
            .create(element, config)
            .then(editor => {
                return editor;
            })
    });

    watchdog.setDestructor(editor => {

        return editor.destroy();
    });

    watchdog.create(innerArea)

    $('.mem-area')[0].append(textArea)

    setTimeout(function () {
        $('h1.ck-placeholder').css('display', 'none')
        $('p.ck-placeholder').attr('data-placeholder', localize['write_text'][currentLang])
    }, 0.1)
}

function renewUploadPlace(caption) {
    loaderStop()
    fileLs = [];
    rotateLs = [];
    let block = $('.wrap-content')
    block[1].style.display = 'block'
    block[2].style.display = 'none'
    block[0].remove()
    $('.btn-settings')[0].style.display = 'block'
    $('.content').addClass('white')
    $('.capt')[0].innerHTML = caption
    $('.tool-button')[0].remove()
    document.querySelector('input[type=file]').value = ''
}

function renewHTML(caption) {
    let block = $('.wrap-content')
    let settings = $('.wrp-settings')
    let htmlBtn = $('.tool-button')
    $("input[name='url']")[0].value = ''
    settings[0].style.display = 'none'
    $('.capt')[0].innerHTML = caption
    htmlBtn.hasOwnProperty(0) && htmlBtn[0].remove()
    settings[0].classList.remove('active')
    block[0].style.display = 'block'
    block.hasOwnProperty(1) && block[1].remove()
    loaderStop()
}
