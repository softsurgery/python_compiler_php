<?php
function run_python_code($code) {
    $scriptFolder = 'scripts/' . date('Y-m-d_H-i-s');
    mkdir($scriptFolder, 0777, true);
    $scriptFilename = $scriptFolder . '/script.py';
    file_put_contents($scriptFilename, $code);
    $pythonExecutable = __DIR__ . '/env/Scripts/python.exe';
    exec("$pythonExecutable $scriptFilename 2>&1", $output, $exitCode);
    $result = array(
        'output' => implode("\n", $output),
        'exitCode' => $exitCode
    );
    return $result;
}

if (isset($_POST['python_code'])) {
    $pythonCode = $_POST['python_code'];
    $result = run_python_code($pythonCode);
    echo json_encode($result);
}
?>
