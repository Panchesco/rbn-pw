export function loadFonts () {
  let script = document.createElement('script')
  script.src = '//use.typekit.net/ybh0yfb.js'
  document.body.appendChild(script)
  try{Typekit.load();}catch(e){}
}
