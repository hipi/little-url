let clearS = null;
function $toast(msg) {
    if (document.getElementById('toast')) {
        document.body.removeChild(document.getElementById('toast'));

        if(clearS){
            clearTimeout(clearS);
            clearS=null;
        }
    }
    const toast = document.createElement('div');
    toast.id = 'toast';
    const icondom = document.createElement('span');
    icondom.className = "icon"

    const msgdom = document.createElement('span');
    msgdom.innerHTML = msg;
    toast.appendChild(icondom);
    toast.appendChild(msgdom);
    document.body.appendChild(toast);
    clearS = setTimeout(() => { document.body.removeChild(document.getElementById('toast')) }, 2000)
}