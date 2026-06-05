# Stop WordPress News Blog Local Server
Get-Process -Name "php" -ErrorAction SilentlyContinue | Stop-Process -Force
Write-Output "Server stopped"
