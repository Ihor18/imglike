let fileLs = [];
let rotateLs = [];
let resp = [];
let cropper;
let cropImageType;
let format;
let canvas;
let ctx;
let time = Date.now();
let filesSize = 0;

const dropArea = document.getElementsByClassName("upload-place")[0]
if (dropArea) {
    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false)
        document.body.addEventListener(eventName, preventDefaults, false)
    })
    ;['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false)
    })
    ;['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false)
    })
    dropArea.addEventListener('drop', handleDrop, false)
}

function preventDefaults(e) {
    e.preventDefault()
    e.stopPropagation()
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

async function handleDrop(e) {
    const files = await e.dataTransfer.files
    if (files.length) {
        const input = document.getElementById('file_input_id');
        if (input.hasAttribute('multiple')) {
            const dt = new DataTransfer();
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (validate(file.name)) {
                    dt.items.add(file);
                }
            }
            input.files = dt.files;
            $('#file_input_id').trigger('change');
        } else if (files.length === 1) {
            if (validate(files[0].name)) {
                input.files = files;
                $('#file_input_id').trigger('change');
            }
        } else {
            alert("Sorry, but you can only upload one file to this tool.");
        }
    }
}

function validate(sFileName) {
    const validator = $('#file_input_id').attr('accept');
    if (validator) {
        const validFileExtensions = validator.split(',');
        if (!validFileExtensions.includes('.' + sFileName.split('.')[1])) {
            alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + validFileExtensions.join(", "));
            return false;
        }
    }
    return true;
}

function handleFiles(files, isResize = false) {
    files = [...files]
    files.forEach((file) => {
        fileLs[file.name] = file
        filesSize += file.size
    })

    if (files.length > 0) {
        files.forEach(file => previewFile(file, isResize, files.length))
    } else {
        uploadRefresh()
    }
    loaderStop()
}

function previewFile(file, isResize = false, fileCount) {

    let reader = new FileReader()
    reader.readAsDataURL(file)
    let fileName = file.name
    let format = fileName.split('.')[1]
    let workArea = document.getElementsByClassName('work-area')[0]

    let list = document.getElementsByClassName('tool')[0]
    reader.onloadend = function () {
        let cart = document.createElement('div')
        cart.className = 'page cart-image'
        cart.setAttribute('id', fileName)
        workArea.appendChild(cart)
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
        if (format === 'psd') {
            img.src = './img/psd.png'
        } else if (format === 'tiff') {
            img.src = './img/TIFF.png'
        } else {
            img.src = reader.result
        }
        wrpImg.appendChild(img)

        imageBlock.appendChild(wrpImg)
        cart.appendChild(imageBlock)

        let blockName = document.createElement('span')
        blockName.textContent = fileName
        cart.appendChild(blockName)

        if (isResize) {
            img.onload = function () {
                let newBlock = document.createElement('span')
                newBlock.className = 'file-size'
                newBlock.textContent = img.naturalWidth + 'x' + img.naturalHeight
                cart.insertBefore(newBlock, blockName)
                if (fileCount === 1) {
                    $('input[name="widthPx"]').val(img.naturalWidth)
                    $('input[name="heightPx"]').val(img.naturalHeight)
                    document.querySelector('[name = "widthPx"]').setAttribute('old-val', img.naturalWidth)
                    document.querySelector('[name = "heightPx"]').setAttribute('old-val', img.naturalHeight)
                } else {
                    document.querySelector('input[name="save-prop"]').checked = false
                }
            }
        }
    }
}


function refresh(files) {

    $('.upload-buttons')[0].style.display = 'none'
    $('.safe-transfer')[0].style.display = 'none'
    switch (location.pathname.substr(1)) {
        case 'en/resize':
        case 'resize':
            resizeView()
            createUploadField()
            handleFiles(files, true)
            break;
        case 'en/compress':
        case 'compress' :
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
            loaderPlay()
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
            createUploadField()
            handleFiles(files)
            break;
        case 'en/convert-from-jpg':
        case 'convert-from-jpg' :
            createUploadField()
            handleFiles(files)
            if (Object.keys(fileLs).length < 2)
                $('input[name="item-2"]')[1].disabled = 'true'
            break;
        case 'en/meme-generator':
        case 'meme-generator':
            meme(files[0])
            document.getElementsByClassName('capt')[0].innerHTML = localize['convert_from_capt'][currentLang];
            break;
    }

}

function resizeView() {
    document.body.getElementsByClassName('wrap-content')[0].style.display = 'none'
}

function previewImage(files) {

    files = [...files]
    files.forEach((file) => {
        fileLs[file.name] = file
    })

    let file = files[0]

    let reader = new FileReader()
    reader.readAsDataURL(file)

    let fileName = file.name

    var elm = document.createElement('div');
    elm.className = 'wrap-content';
    var innerEl = document.createElement('div');
    innerEl.className = 'tool flex jcc';
    let sidebar = document.getElementsByClassName('sidebar')[0]
    sidebar = sidebar.cloneNode(true)
    sidebar.style.display = 'block'
    var workArea = document.createElement('div');
    workArea.className = 'work-area upload__files'
    innerEl.appendChild(workArea)
    innerEl.appendChild(sidebar)
    elm.appendChild(innerEl)

    document.getElementsByClassName('content')[0].classList.remove("white")

    let cart = document.createElement('div')
    cart.className = 'crop-area'
    cart.setAttribute('id', fileName)
    workArea.appendChild(cart)
    $('.container')[2].appendChild(elm)

    reader.onloadend = function () {

        var img = document.createElement('img')
        img.src = reader.result
        img.id = "image"
        cart.appendChild(img)


        var $image = $("#image")[0]
        cropper = new Cropper($image, {
            zoomable: false,
            zoomOnTouch: false,
            zoomOnWheel: false,
            background: false,
            dragMode: 'crop',
            crop(event) {
                $('input[name="width"]').val(Math.round(event.detail.width))
                $('input[name="height"]').val(Math.round(event.detail.height))
                $('input[name="x"]').val(Math.round(event.detail.x))
                $('input[name="y"]').val(Math.round(event.detail.y))
            },
        });
        loaderStop()
    }

}


function compress() {
    document.getElementsByClassName('capt')[0].innerHTML = localize['changed_capt'][currentLang];
}


function enableCrop() {
    document.getElementsByClassName('wrap-content')[0].remove()
}

function createUploadField() {

    var elm = document.createElement('div');
    elm.className = 'wrap-content';

    var load = document.getElementById('load');
    load.insertBefore(elm, load.firstChild);

    var innerEl = document.createElement('div');
    innerEl.className = 'tool flex jcc';

    let sidebar = document.getElementsByClassName('sidebar')[0]
    sidebar = sidebar.cloneNode(true)
    sidebar.style.display = 'block'
    var workArea = document.createElement('div');
    workArea.className = 'work-area upload__files'
    innerEl.appendChild(workArea)
    innerEl.appendChild(sidebar)
    document.getElementsByClassName('wrap-content')[1].style.display = 'none'
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

    if (Object.keys(fileLs).length === 0) {
        uploadRefresh()
    }
}

function uploadRefresh() {
    let block = $('.wrap-content')
    block[1].style.display = "block"
    block[0].remove()
    fileLs = [];
    rotateLs = [];
    $('.content').addClass('white')

    $('.tool-button')[0] !== undefined && $('.tool-button')[0].remove()

    document.querySelector('input[type=file]').value = ''
}

function sendRequest() {
    let url = '/compress-image'
    let formData = new FormData()
    let cookieName = randomString()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);
    formData.append('id', cookieName)
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }

    let text = localize['compress_capt'][currentLang]
    let failMessage = localize['extension_error'][currentLang]
    sendData(url, formData, afterSend(), text, failMessage)


    let compressUrl = '/progress/compress';
    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length+1)
    progressData.append('id', cookieName)

    endCallback = function () {
        let elem = document.createElement('div')
        elem.className = "capt"
        let oldSize = (resp['old'] / 1000000).toFixed(2)
        let newSize = (resp['new'] / 1000000).toFixed(2)
        let compressResult = Math.round(100 - (newSize / oldSize * 100))
        if (oldSize / newSize > 1) {
            elem.innerHTML = localize['reduce_by'][currentLang] + " " + compressResult + "%<br>" + oldSize + "MB > " +
                newSize + "MB"
        }
        $('.container')[1].appendChild(elem)
        delete resp['old']
        delete resp['new']
    }

    checkProgress(progressData, endCallback, compressUrl)
    loaderStop()
}

function load() {
    loaderPlay()
    for (img in resp) {
        if (resp[img].length > 100) {
            var a = document.createElement('a');
            let data_type = 'image'
            if (img.split('.')[img.split('.').length - 1] === 'zip') {
                data_type = 'application'
            }
            a.href = 'data:' + data_type + '/' + img.split('.')[img.split('.').length - 1] + ';base64,' + resp[img];
            a.download = img;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    }
    loaderStop()
}


function resizeImage() {
    let isPixel = document.querySelector('[data-tab = "tab-pixel"]').classList.contains("active")
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let formData = new FormData()
    let width
    let height
    let cookieName = randomString()
    formData.append('_token', csrf);
    formData.append('id', cookieName)
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }

    if (isPixel) {
        width = document.querySelector('[name = "widthPx"]').value
        height = document.querySelector('[name = "heightPx"]').value

        formData.append('widthPx', width)
        formData.append('heightPx', height)
    } else {
        formData.append('reduce', document.querySelector('input[name="item-2"]:checked').value)

    }

    let text = localize['convert_from_capt'][currentLang]
    let failMessage = localize['extension_error'][currentLang]


    if (isPixel && $('input[name="not-scale"]')[0].checked) {
        let block = $('.wrp-img')
        for (let i = 0; i < Object.keys(fileLs).length; i++) {
            let img_width = block[i].lastChild.naturalWidth
            let img_heigth = block[i].lastChild.naturalHeight
            if (width > img_width || height > img_heigth) {
                isSend = false
                $('#inc-error')[0].innerHTML = '*' + localize['img_size'][currentLang] + ' <div class="file-name">' + Object.keys(fileLs)[i] +
                    '</div> ' + localize['less_than_size'][currentLang]
                break;
            }
        }
    }

    let url = 'resize-image';

    formData.append('id', cookieName)


    sendData(url, formData, afterSend(), text, failMessage)


    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length + 1)
    progressData.append('id', cookieName)
    progressData.append('name', 'resized.zip')
    checkProgress(progressData)
    loaderStop()
}

function trackInput(val, isHeight) {

    let checkbox1 = document.querySelector('[name = "save-prop"]').checked
    let value
    if (checkbox1) {
        if (isHeight) {
            value = Math.round(val * document.querySelector('[name = "widthPx"]').value / document.querySelector('[name = "heightPx"]').getAttribute('old-val'))
            document.querySelector('[name = "widthPx"]').value = value
            document.querySelector('[name = "widthPx"]').setAttribute('old-val', value)
        } else {
            value = Math.round(val * document.querySelector('[name = "heightPx"]').value / document.querySelector('[name = "widthPx"]').getAttribute('old-val'))
            document.querySelector('[name = "heightPx"]').value = value
            document.querySelector('[name = "heightPx"]').setAttribute('old-val', value)
        }
    }

    if (isHeight) {
        document.querySelector('[name = "heightPx"]').setAttribute('old-val', val)
    } else {
        document.querySelector('[name = "widthPx"]').setAttribute('old-val', val)
    }
}

async function sendData(url, formData, callback, text, failMessage) {
    loaderPlay()
    formData.append('time', time)
    fetch(url, {
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


}

function rotate() {
    document.body.getElementsByClassName('wrap-content')[0].style.display = 'none'
}

function rotateImage() {
    let url = '/rotate-image'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let cookieName = randomString();

    formData.append('_token', csrf);
    formData.append('id', cookieName)
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }


    for (let key in rotateLs) {
        formData.append('rotates[' + key + ']', rotateLs[key])
    }

    sendData(url, formData, afterSend())


    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length + 1)
    progressData.append('id', cookieName)
    progressData.append('name', 'rotated.zip')
    checkProgress(progressData)
    loaderStop()
}

function afterSend() {
    $('.safe-transfer')[0].style.display = "none"
    $('.wrap-content')[0].style.display = "none"
    $('.wrap-content')[2].style.display = "block"
    $('.tool-button')[0] !== undefined ? $('.tool-button')[0].style.display = "none" : ''
}

function rotateDeg(degree) {
    let carts = document.getElementsByClassName("cart-image")

    for (let item of carts) {
        let node = item.firstChild
        if (node.lastChild.lastChild.style.transform) {
            let num = parseInt(node.lastChild.lastChild.style.transform.split('(')[1].split('d')[0]) + degree
            node.lastChild.lastChild.style.transform = "rotate(" + num % 360 + "deg)"
            rotateLs[item.id] = num
        } else {
            node.lastChild.lastChild.style.transform = "rotate(" + degree + "deg)"
            rotateLs[item.id] = 90
        }
    }

}

function reset() {
    let carts = document.getElementsByClassName("wrp-img")

    rotateLs = []

    for (let item of carts) {
        let node = item.lastChild
        node.style.transform = null
    }
}

function prepareDownloadCrop() {
    setTimeout(function () {
        setButtonProgress(100)
    }, 400)

    document.getElementsByClassName('wrap-content')[1].style.display = 'none'
    document.getElementsByClassName('wrap-content')[0].style.display = 'block'
    let wrap = document.createElement('div')
    wrap.className = 'wrap-content'
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
    }, cropImageType, 1)
}

function changeCropperBox() {
    let left, top, width, height

    left = parseInt($("input[name='x']")[0].value)
    top = parseInt($("input[name='y']")[0].value)
    width = parseInt($("input[name='width']")[0].value)
    height = parseInt($("input[name='height']")[0].value)

    cropper.setData({"left": left, "top": top, "width": width, "height": height})

}

function loaderPlay() {
    $('.loader')[0].style.display = "block"
}

function loaderStop() {
    $('.loader')[0].style.display = "none"
}

function htmlToImage() {
    let url = '/convert-html'

    format = $('#format').find(":selected")[0].value
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

        document.getElementsByClassName('wrap-content')[0].style.display = 'none'

        document.getElementsByClassName('capt')[0].innerHTML = localize['convert_from_capt'][currentLang];
        let wrapContent = document.createElement('div')
        wrapContent.className = 'wrap-content'
        let tool = document.createElement('div')
        tool.className = 'tool flex jcc'
        let main = document.createElement('div')
        main.className = 'work-area upload__files p-20'
        let sidebar = document.getElementsByClassName('sidebar')[0]
        sidebar.style.display = 'block'

        let block = document.createElement('div')
        block.className = 'html-area'
        let image = document.createElement('img')
        for (img in resp) {
            image.src = 'data:image/' + img.split('.')[img.split('.').length - 1] + ';base64,' + resp[img];
        }
        block.appendChild(image)
        main.appendChild(block)
        tool.appendChild(main)
        tool.appendChild(sidebar)
        wrapContent.appendChild(tool)
        $('.container')[2].appendChild(wrapContent)
        $('.content').removeClass('white')
        $('[name="url"]').attr('old-html', $('[name="url"]')[0].value)
        loaderStop()

    }

    sendData(url, formData, callback, localize['convert_web_pages'][currentLang], localize['enter_correct'][currentLang] + ' url')

}

function convertHtml() {

    let format = $('#format').find(":selected")[0].value

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
    if ($('input[name="url"]').attr('old-html') == $('input[name="url"]')[1].value) {
        $('.wrap-content')[1].style.display = "none"
        $('.wrap-content')[2].style.display = "block"

        setTimeout(function () {
            setButtonProgress(50)
        },200)

        callback = function () {
            setButtonProgress(100);
        }
    } else {
        callback = function () {
            for (img in resp) {
                $('.html-area img')[0].src = 'data:image/' + img.split('.')[img.split('.').length - 1] + ';base64,' + resp[img];
            }
            $('[name="url"]').attr('old-html', $('[name="url"]')[0].value)
        }
    }

    sendData(url, formData, callback, localize['convert_web_pages'][currentLang], localize['enter_correct'][currentLang] + ' url')
    loaderStop()
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
    $('.upload-mobile').css('display', 'none')
    $('.content').removeClass('white')
    files = [...files]
    let iteration = 0;
    let slider = $('.slider')[0]
    let block = document.getElementsByClassName('wrap-content')[0]

    let tool = document.createElement('div')
    tool.className = 'tool flex jcc'
    let main = document.createElement('div')
    main.className = 'work-area upload__files p-20'
    let sidebar = document.getElementsByClassName('sidebar')[0]
    sidebar.style.display = 'block'


    tool.appendChild(main)
    tool.appendChild(sidebar)
    block.appendChild(tool)

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
    slider.className += ' cust_active'

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

        $('li[role = "presentation"]').addClass('cart-image').addClass('page')

        let preview = $('.slick-dots')

        preview.addClass('tool flex jcc')
        $('.watermark-area')[0].style.display = 'block'
        let hint = document.createElement('div')
        hint.className = 'hint'
        hint.innerHTML = localize['watermark_apply'][currentLang]
        $('.slider')[0].insertBefore(hint, preview[0])

        setTimeout(function () {
            let height = $('.slick-active > img')[0].height
            $('.slide.right')[0] ? $('.slide.right')[0].style.top = height / 2 + 'px' : ''
            $('.slide.left')[0] ? $('.slide.left')[0].style.top = height / 2 + 'px' : ''
            $('.slick-slide').css('height', height)
            $('.watermark-area').append($('.slick-dots')[0])
            main.appendChild(document.getElementsByClassName('watermark-area')[0])
        }, 10)
        loaderStop()
    }, 40 * iteration)

}

function uploadWatermarkPreview() {
    showWatermarkOptions(false)
}

function watermarkConvert() {
    let url = '/make-watermark'
    let data = []
    let option = $('#position_mark>option:selected')
    let text = $('#text-input')
    let file = $('#watermark_file')[0]
    let cookieName = randomString()

    text.css('display') === 'block' ? data['text'] = $('[name="watermark"]').val() : ''

    $('#font-size').css('display') === 'flex' ? data['font-size'] = $('[name="font-size"]').val() : ''

    $('#angle').css('display') === 'flex' ? data['angle'] = $('[name="angle"]').val() : ''

    file.files.length > 0 ? data['watermark_file'] = file.files[0] : ''


    if ($('input[name="item-2"]:checked').data('type') == 'position') {
        data['position_mark'] = $('#position_mark').val()
        data['position_align'] = option.data('align')
        data['position_valign'] = option.data('valign')
    } else {
        data['position_mark'] = 'top-left'
        data['position_align'] = 'left'
        data['position_valign'] = 'top'
        data['position_x'] = $('[name="x-value"]').val()
        data['position_y'] = $('[name="y-value"]').val()
    }

    if ($('#watermark-options').attr('data-action') === 'text') {
        let color = hexToRgb($('input[name="color"]').val())
        let opacity = parseFloat(1 - Number('0.' + $('input[name="opacity"]').val()).toFixed(1))
        data['color'] = JSON.stringify([color.r, color.g, color.b, opacity])
    } else {
        data['opacity'] = $('input[name="mark_opacity"]').val() * 10
        data['watermark_w'] = $('input[name="widthPx"]').val()
        data['watermark_h'] = $('input[name="heightPx"]').val()
    }


    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    formData.append('_token', csrf);
    formData.append('id',cookieName)
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }
    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }
    let text1 = localize['convert_from_capt'][currentLang]
    let failMessage = localize['not_empty_field'][currentLang]

    $('.wrap-content')[0].style.display = "none"
    $('.wrap-content')[1].style.display = "block"

    sendData(url, formData, null, text1, failMessage)


    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length + 1)
    progressData.append('id', cookieName)
    progressData.append('name', 'watermark.zip')
    checkProgress(progressData)
    loaderStop()
}


function showWatermarkOptions(isText) {
    if (isText) {
        $('#text-input').css('display', 'block')
        $('#font-size').css('display', 'flex')
        $('#angle').css('display', 'flex')
        $('#color').css('display', 'flex')
        $('#opacity').css('display', 'flex')
        $('#watermark-options').attr('data-action', 'text')
    } else {
        $('#watermark_image').css('display', 'block')
        $('#watermark-options').attr('data-action', 'image')
    }
    $('#watermark-options').css('display', 'block')
    $('.btn-grey').css('display', 'none')
    //  $('.capt').css('display', 'none')
    $('.bottom-btn').css('display', 'flex')
}

function fileClick() {
    $('#file_input_id').click()
}

function convertToJpeg() {
    let url = '/convert-to'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let cookieName = randomString()
    formData.append('_token', csrf);
    formData.append('id', cookieName)
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    sendData(url, formData,afterSend())

    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length + 1)
    progressData.append('id', cookieName)
    progressData.append('name', 'converted.zip')
    checkProgress(progressData)
    loaderStop()
}

function convertFromJpeg() {
    let url = '/convert-from'
    let formData = new FormData()
    let csrf = document.querySelector('meta[name="csrf-token"]').content;
    let cookieName = randomString()
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
    formData.append('id', cookieName);
    for (let key in fileLs) {
        formData.append('files[]', fileLs[key])
    }

    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    }
    let text = localize['convert_web_pages'][currentLang]
    let failMessage = localize['incorrect_data'][currentLang]
    sendData(url, formData, afterSend(), text, failMessage)

    let progressData = new FormData()
    progressData.append('_token', csrf);
    progressData.append('maxNumber', Object.keys(fileLs).length + 1)
    progressData.append('id', cookieName)
    progressData.append('name', 'converted.zip')
    checkProgress(progressData)
    loaderStop()
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
    $('.upload-place')[0].style.display = 'none'
    $('.upload-mobile').css('display', 'none')
    $('.upload-buttons')[0].style.display = 'none'
    $('.safe-transfer')[0].style.display = 'none'
    let buttons = $('.btns')[0];
    let sidebar = document.getElementsByClassName('sidebar')[0]
    sidebar = sidebar.cloneNode(true)
    sidebar.style.display = 'block'
    let outerDiv = document.createElement('div')
    outerDiv.className = 'mem-area'
    let tool = document.createElement('div')
    tool.className = 'tool flex jcc'
    let workArea = document.createElement('div')
    workArea.className = 'work-area upload__files'
    workArea.append(outerDiv)
    tool.append(workArea)
    tool.append(sidebar)
    let innerDiv = document.createElement('div')
    innerDiv.className = 'edit-panel flex jcc'
    innerDiv.append(buttons)
    buttons.style.display = 'flex'
    outerDiv.append(innerDiv)
    $('.wrap-content')[0].append(tool)
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
    $('.content').addClass('white')
    $('.capt')[0].innerHTML = caption
    $('.tool-button')[0] !== undefined && $('.tool-button')[0].remove()
    document.querySelector('input[type=file]').value = ''
}

function renewHTML(caption) {
    let block = $('.wrap-content')
    let htmlBtn = $('.tool-button')
    $("input[name='url']")[0].value = ''
    $('.capt')[0].innerHTML = caption
    htmlBtn.hasOwnProperty(0) && htmlBtn[0].remove()
    block[0].style.display = 'block'
    block.hasOwnProperty(1) && block[1].remove()
    loaderStop()
}

function watermarkSettings(obj) {
    if (obj.dataset.type === 'position') {
        $('#position_w').css('display', 'block')
        $('#coordinates_w').css('display', 'none')
    } else {
        $('#position_w').css('display', 'none')
        $('#coordinates_w').css('display', 'block')
    }
}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

function randomString() {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < 20; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}

function setButtonProgress(percent) {
    let button = document.querySelector(".btn-download")
    button.querySelector("p").style.filter = 'brightness(0) invert(1)';
    button.querySelector(".button__progress").style.width = `${parseInt(percent)}%`;
    if (percent === 100) {
        let progressBtn = document.querySelector(".button__progress")
        progressBtn.style.borderBottomRightRadius = '8px'
        progressBtn.style.borderTopRightRadius = '8px'
        button.disabled = false
    }
}

function changeTab(element) {
    $('.item').removeClass('active');
    $('.tab-content').removeClass('current');
    element.classList.add('active');
    var tab = element.getAttribute('data-tab');
    $('.' + tab).addClass('current');
}

function changeValOnWheel(event) {

    $this = $(this);
    $inc = parseFloat($this.attr('step'));
    $max = parseFloat($this.attr('max'));
    $min = parseFloat($this.attr('min'));
    $currVal = parseFloat($this.val());

    if (isNaN($currVal)) {
        $currVal = 0.0;
    }

    if (event.deltaFactor * event.deltaY > 0) {
        if ($currVal + $inc <= $max) {
            $this.val($currVal + $inc);
        }
    } else {
        if ($currVal - $inc >= $min) {
            $this.val($currVal - $inc);
        }
    }
}

function setWatermarkFields() {
    setTimeout(function () {
        let img = $('.watermark-img')[0]
        $('input[name="widthPx"]').val(img.naturalWidth)
        $('input[name="heightPx"]').val(img.naturalHeight)
    }, 40)
}

function changeOpacity(value) {
    $('.watermark-img').css('opacity', 1 - value / 10)
}

function checkProgress(formdata, endCallback, url, progressCallback) {
    let requestCount = 0;
    let end = false;

    setTimeout(() => {
        while (requestCount !== 300) {
            (function (requestCount) {
                setTimeout(() => {
                    if (!end) {
                        fetch(url ? url : '/progress', {
                            method: 'POST',
                            body: formdata
                        }).then(response => response = response.json())
                            .then(data => resp = data).then(() => {

                            if (resp.action === 'progress') {
                                setButtonProgress(resp.progress / Object.keys(fileLs).length * 100)
                                progressCallback && progressCallback()
                            } else if (resp.action === 'end') {
                                end = true
                                setButtonProgress(100)
                                endCallback && endCallback()
                            }
                        })
                    }
                }, 400 * requestCount)
            })(requestCount++);
        }
    }, 400)
}
