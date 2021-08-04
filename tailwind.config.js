module.exports = {
  purge: [
    './*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      primary: 'Oswald',
      secondary: 'EB Garamond',
    },
    colors: {
      white: '#ffffff',
      'white-50': 'rgba(255, 255, 255, .5)',
      black: '#000000',
      'black-50': 'rgba(0, 0, 0, .5)',
      primary: '#007bff',
      secondary: '#6c757d',
      success: '#28a745',
      danger: '#dc3545',
      warning: '#ffc107',
      info: '#17a2b8',
      light: '#f8f9fa',
      dark: '#343a40',
      body: '#212529',
      muted: '#6c757d',
    },
    container: {
      center: true,
      padding: '15px'
    }
  },
  variants: {},
  plugins: [],
}