window.showFlashMessage = (type, message) => {
    console.log(type, message)
    let flash = document.getElementById("flash-message");
    let data = Alpine.$data(flash);
    data.type = type;
    data.message = message;
    data.show = true;
    data.title = type == 'error' ? 'Error' : 'Success';
    data.icon_svg = type == 'error'
        ? 'M10 1a9 9 0 1 1 0 18A9 9 0 0 1 10 1Zm2.7 10.3a1 1 0 0 1-1.4 1.4L10 11.4l-1.3 1.3a1 1 0 0 1-1.4-1.4l1.3-1.3-1.3-1.3a1 1 0 1 1 1.4-1.4L10 8.6l1.3-1.3a1 1 0 0 1 1.4 1.4L11.4 10l1.3 1.3Z'
        : 'M10 1a9 9 0 1 1 0 18A9 9 0 0 1 10 1Zm4.3 6.2a1 1 0 0 0-1.4 0L9 11.1 7.1 9.2a1 1 0 0 0-1.4 1.4l2.6 2.6a1 1 0 0 0 1.4 0l4.6-4.6a1 1 0 0 0 0-1.4Z'
    setTimeout(() => data.show = false, 3000);
};
