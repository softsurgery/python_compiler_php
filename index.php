<!DOCTYPE html>
<html>

<head>
    <title>Python Code Execution</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function executeCode() {
            const code = document.getElementsByName("python-code")[0].innerText;
            const outputContainer = document.getElementsByName("output-container")[0];
            outputContainer.innerHTML = "";

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "run.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const result = JSON.parse(xhr.responseText);

                    if (result.exitCode === 0) {
                        outputContainer.textContent = result.output;
                    } else {
                        outputContainer.textContent = "Error: " + result.output;
                    }
                }
            };
            xhr.send("python_code=" + encodeURIComponent(code));
        }
    </script>
    <style>
        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        body {
            background-color: #123;
            display: flex;
            margin: 0;
            justify-content: center;
            overflow-x: hidden;
        }

        .paper-container {
            display: flex;
        }

        .sheet {
            background-color: #fff;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' height='30' width='100%'><circle r='10' cx='20' cy='13' fill='%23888' /><line x1='80' x2='80' y1='0' y2='30' stroke='%23f00' /><line x1='0' x2='100%'  y1='28' y2='28' stroke='%2300f'/></svg>");
            background-repeat: repeat-y;
            width: 70%;
        }

        .textarea {
            border-radius: 10px;
            font-family: cursive;
            font-size: 20px;
            line-break: anywhere;
            line-height: 30px;
            min-height: 100vh;
            padding: 0 20px 0 100px;
            width: 50vw;
            margin: 20px;
        }

        button {
            font-family: cursive;
            height: 30px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="paper-container">
        <span name="python-code" class="sheet textarea" role="textbox" spellcheck="false" contenteditable="true">
            print("Hello World")
        </span>
    </div>
    <button onclick="executeCode();">Execute</button>

    <div class="paper-container">
        <span name="output-container" class="sheet textarea" role="textbox" spellcheck="false" contenteditable="true">
            Execute Code...
        </span>
    </div>
</body>
</html>