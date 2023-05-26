function toggle () {
  let nav = document.getElementById('ua-speccoll-branding-nav')

  if (nav.classList.contains('open')) {
    // close menu
    nav.classList.remove('open')
  } else {
    // open menu
    nav.classList.add('open')
  }
}

export function menu () {
  document.getElementById('ua-speccoll-branding-logo').addEventListener('click', toggle)
}
