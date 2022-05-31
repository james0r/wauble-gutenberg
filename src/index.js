import Alpine from "alpinejs"
import collapse from "@alpinejs/collapse"
import alpineGlobals from "./alpine/alpineGlobals"
import helpers from "./helpers.js"
import "./a11y.js"
import "./scss/main.scss"

window.Alpine = Alpine

// Declare our namespace on the window
const namespace = "wauble"

// Define our namespace and helpers property
window[namespace] = window[namespace] || {}
window[namespace].helpers = {}  

// Map helper functions to window[namespace].helpers
for (const [key, value] of Object.entries(helpers)) {
  window[namespace].helpers[key] = value
}

if (process.env.NODE_ENV === "development") {
  const tableData = {
    "Theme Namespace": namespace,
    "WP Template": window[namespace].wordpress.currentTemplate,
    "WP Version": window[namespace].wordpress.wpVersion
  }
  console.table(tableData)
}

Alpine.plugin(collapse)
alpineGlobals.register(Alpine)
Alpine.start()
