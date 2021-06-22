# SensyDeviseSaving
Technical test optional for Sensy
## Purpose
Save all rates of all currency pairs available with iBanFirst API, in JSON format.
## How to use it ?
Having Php 7.2 installed on computer
CLI :
* git clone https://github.com/Heroponne/SensyDeviseSaving.git
* cd SensyDeviseSaving
* php SensySaveRates.php

A file with currency pairs and rates will be created in the directory, and every 10 minutes, the new rates will be append in the file "saved_rates.txt".
## Author
Florence Orgeret
