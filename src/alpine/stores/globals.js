export default {
  name: 'globals',
  store() {
    return {
      themeName: 'Wauble',
      isMobileMenuVisible: false,
      openMobileMenu() {
        this.isMobileMenuVisible = true
      },
      closeMobileMenu() {
        this.isMobileMenuVisible = false
      },
      toggleMobileMenu() {
        this.isMobileMenuVisible = !this.isMobileMenuVisible
      }
    }
  }
}