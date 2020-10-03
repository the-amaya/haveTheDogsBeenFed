#!/usr/bin/env python3

import sys
import time
import requests
import json

dog = (sys.argv[1])
time = time.now()
if dog == '1':
	dog = "Svedka"
elif dog == '2':
	dog = "Sangria"
elif dog == '3':
	dog = "Islay"
else:
	sys.exit()

message = ('%s has been fed at %s' % dog, time)

def discordhook(a):
	data = {}
	urlw = "https://discordapp.com/api/webhooks/761858600543977482/gJVPoYeMjCBnAfYnBu2vuqlei1m2AMqGLdib9c4NXOSVShlWxfqf2UlLZlg8EZAmfkYg"
	data["content"] = a
	result = requests.post(urlw, data=json.dumps(data), headers={"Content-Type": "application/json"})

	try:
		result.raise_for_status()
	except requests.exceptions.HTTPError as err:
		pass
	else:
		pass


discordhook()