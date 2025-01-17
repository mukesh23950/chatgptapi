# ChatGPT API Tester

A simple and elegant web application to test your OpenAI ChatGPT API key with a modern UI built using PHP and Tailwind CSS.

## 📋 Features

- Modern and responsive UI using Tailwind CSS
- Secure API key testing
- Real-time API response feedback
- Clean and modular code structure
- Easy to set up and use

## 🛠️ Prerequisites

- XAMPP (or any PHP server) installed
- OpenAI API key
- Web browser
- Internet connection (for Tailwind CSS CDN)

## ⚙️ Installation

1. Clone this repository to your XAMPP's htdocs folder:
```bash
cd c:/xampp/htdocs
git clone https://github.com/yourusername/chatgptapi.git
```

2. Start your XAMPP Apache server

3. Navigate to the project in your web browser:
```
http://localhost/chatgptapi
```

## 📁 Project Structure

```
chatgptapi/
├── index.php          # Main application file
├── header.php         # Header component
├── footer.php         # Footer component
├── config.php         # API configuration
├── api_test.php       # API testing logic
├── styles.css         # Custom styles
└── README.md          # Documentation
```

## 💻 Usage

1. Open the application in your web browser
2. Enter your OpenAI API key in the secure input field
3. Click "Test API" button
4. View the results:
   - Green box: API is working correctly
   - Red box: API error or invalid key

## 🔒 Security Notes

- The API key is transmitted securely
- The key is never stored on the server
- Use HTTPS in production for additional security
- Keep your API key confidential

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## ✨ Acknowledgments

- OpenAI for providing the ChatGPT API
- Tailwind CSS for the beautiful styling
- XAMPP for the local development environment

---
Made with ❤️ by [Your Name]
