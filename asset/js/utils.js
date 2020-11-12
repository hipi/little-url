function checkPhone() {
  return navigator.platform.indexOf('Mac') === navigator.platform.indexOf('Win') &&
    navigator.maxTouchPoints &&
    2 < navigator.maxTouchPoints
}
function textCopy(text) {
  function addFake(value) {
    const fakeDom = document.createElement("textarea");
    fakeDom.style.fontSize = '12pt';
    // Reset box model
    fakeDom.style.border = '0';
    fakeDom.style.padding = '0';
    fakeDom.style.margin = '0';
    // Move element out of screen horizontally
    fakeDom.style.position = 'absolute';
    const isRTL = document.documentElement.getAttribute('dir') == 'rtl';
    fakeDom.style[isRTL ? 'right' : 'left'] = '-9999px';
    // Move element to the same position vertically
    const yPosition = window.pageYOffset || document.documentElement.scrollTop;
    fakeDom.style.top = yPosition + 'px';
    fakeDom.setAttribute('readonly', '');
    fakeDom.value = value;
    document.body.appendChild(fakeDom);
    return fakeDom
  }
  const selectdom = addFake(text);
  selectdom.select();
  let succeeded;
  try {
    succeeded = document.execCommand('copy');
  } catch (err) {
    succeeded = false;
  }
  // document.body.removeChild(selectdom);
  return succeeded;
}