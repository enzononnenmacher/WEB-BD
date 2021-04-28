New-Alias ipc4 ipconfig
$ipV4 = Test-Connection -ComputerName (hostname) -Count 1  | Select IPV4Address
Add-Content ipV4.txt $ipV4
