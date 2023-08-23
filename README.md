# Python Code Execution Web Application

This project is a web application that allows users to enter Python code in a textarea on a webpage. When the "Execute Code" button is clicked, the entered Python code is sent to a PHP script on the server. The PHP script saves the code to a file, executes it using the Python interpreter, captures the output and any errors, and then sends the result back to the webpage without reloading the entire page.

## Technologies Used

- HTML
- CSS
- JavaScript (AJAX)
- PHP
- Python (venv)

## Features

- Interactive web interface for writing and executing Python code.
- Real-time display of code execution output and errors.
- Secure execution environment (sandboxed) to mitigate risks of executing arbitrary code.
- Utilizes AJAX to send and receive data asynchronously without page reload.
- Separate output and error handling for better user experience.

## Usage

1. Clone the repository to your local machine.
2. Set up a web server (e.g., Apache, Nginx) and configure it to serve the project directory.
3. Install virtualenv using pip3
```
pip3 install --user virtualenv
```

4. Now create a virtual environment
```
python -m venv env
```

5. Access the application by opening the index.php file in a web browser.

## Development

1. Modify the HTML, JavaScript, and PHP files to suit your requirements.
2. Customize the styling using CSS or another front-end framework.
3. Ensure proper input validation and security measures, especially when executing user-provided code.
4. Consider additional features such as syntax highlighting, saving code history, etc.

## Credits

- Gabriel Coelho's Template: [Sheet Template](https://codepen.io/userliev/pen/zYNrjRo)

## License

This project is licensed under the [MIT License](LICENSE).

---
