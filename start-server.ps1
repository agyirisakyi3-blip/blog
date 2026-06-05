# Start WordPress News Blog Local Server
$phpDir = "$PSScriptRoot\php"
$wpDir = "$PSScriptRoot\wordpress"
$port = 8080

# Kill any existing PHP server on this port
Get-Process -Name "php" -ErrorAction SilentlyContinue | Stop-Process -Force
Start-Sleep -Seconds 1

# Start PHP's built-in server
Start-Process -FilePath "$phpDir\php.exe" -ArgumentList "-S 0.0.0.0:$port -t `"$wpDir`"" -WindowStyle Hidden

Start-Sleep -Seconds 2
Write-Output "WordPress News Blog is running!"
Write-Output "Site:     http://127.0.0.1:$port"
Write-Output "Admin:    http://127.0.0.1:$port/wp-admin/"
Write-Output "Login:    admin / admin123"
Write-Output ""
Write-Output "Theme:    newsblog-theme (custom)"
Write-Output "DB:       SQLite (no MySQL needed)"
