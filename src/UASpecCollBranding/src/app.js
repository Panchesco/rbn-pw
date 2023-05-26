import 'css/ua-speccoll-branding.css'
import {menu} from 'lib/menu.js'
import {loadSiteImprove} from 'lib/analytics.js'
import {loadFonts} from 'lib/fonts.js'
import svg4everybody from 'svg4everybody'

document.addEventListener('DOMContentLoaded', () => {
  loadFonts()
  loadSiteImprove()
  menu()
  svg4everybody()
})
