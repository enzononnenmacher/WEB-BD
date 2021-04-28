<#Créer le répertoire#>
New-Item -Path C:\MA-18\Fichier -ItemType Directory
New-Item -Path C:\MA-18\Fichier\Texte -ItemType Directory
New-Item -Path C:\MA-18\Fichier\PDF -ItemType Directory
New-Item -Path C:\MA-18\Scriptes -ItemType Directory
New-Item -Path C:\MA-18\Scriptes\Test -ItemType Directory
New-Item -Path C:\MA-18\Scriptes\Production -ItemType Directory
<#Créer le dir du ma-18 dans dir.txt#>
Dir C:\ma-18 -Recurse > C:\ma-18\Fichier\Texte\dir.txt
<#Créer le dir de C:\Windows qui date de moins d'un mois dans windows.txt#>
Dir C:\windows -Recurse | Where-Object { !($_.LastWriteTime -lt (Get-Date).AddMonths(-1))} > C:\ma-18\Fichier\Texte\windows.txt 
<#Créer un fichier vide.txt#>
New-Item -Path C:\ma-18\Fichier\Texte\vide.txt -ItemType File
<#Créer un nouveau alias pour remove-item#>
New-ALias effacer Remove-Item
<#Créer le dir du fichier texte dans un ficher Texte.txt#>
Dir C:\ma-18\Fichier\Texte -Recurse > C:\ma-18\Fichier\Texte\texte.txt
<#Enlevez le fichier vide.txt avec l'alias créer préalablement#>
effacer C:\ma-18\Fichier\Texte\vide.txt