module.exports = {
  purge: [
    './*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  important: true,
  theme: {
    fontFamily: {
      primary: 'Oswald',
      secondary: 'EB Garamond',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: 'rgb(var(--color-white))',
      black: 'rgb(var(--color-black))',
      primary: 'rgb(var(--color-primary))',
      secondary: 'rgb(var(--color-secondary))',
      success: 'rgb(var(--color-success))',
      danger: 'rgb(var(--color-danger))',
      warning: 'rgb(var(--color-warning))',
      info: 'rgb(var(--color-info))',
      light: 'rgb(var(--color-light))',
      dark: 'rgb(var(--color-dark))',
      body: 'rgb(var(--color-body))',
      muted: 'rgb(var(--color-muted))',
    },
    container: {
      center: true,
      padding: '15px'
    }
  },
  variants: {},
  plugins: [],
}
