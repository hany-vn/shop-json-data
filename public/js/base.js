function notify(stt, msg, pos='right') {
    let colors = {
        "success": "linear-gradient(to right, #00b09b, #96c93d)",
        "error": "linear-gradient(to right, #FF9900, #FF3300)",
        "warning": "linear-gradient(to right, #FFCC33, #FF9900)"
    };

    var toast = Toastify({
        text: msg,
        style: {
            background: colors[stt]
        },
        position: pos,
        onClick: () => {
            toast.hideToast();
        }
    });
    toast.showToast();
}