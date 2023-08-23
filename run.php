<?php
function run_python_code($code) {
    // Create a directory for scripts using the current date and time
    $scriptFolder = 'scripts/' . date('Y-m-d_H-i-s');
    mkdir($scriptFolder, 0777, true); // Create directory recursively
    
    // Generate a unique filename for the script
    $scriptFilename = $scriptFolder . '/script.py';
    
    // Save the code to the script file
    file_put_contents($scriptFilename, $code);
    
    // Execute the script using the Python interpreter and capture both output and errors
    exec("python $scriptFilename 2>&1", $output, $exitCode);
    
    // Combine the output and errors
    $result = array(
        'output' => implode("\n", $output),
        'exitCode' => $exitCode
    );
    
    return $result;
}

if (isset($_POST['python_code'])) {
    $pythonCode = $_POST['python_code'];
    $result = run_python_code($pythonCode);
    
    // Convert the result array to JSON and return it
    echo json_encode($result);
}


?>
