import os
import requests
import json,sys

url = 'https://www.proxyscan.io/api/proxy?ping=20&limit=1&type=http,https'
# api req to get a proxy json, change ping value up if empty resp
resp = requests.get(url)
#print(resp.json())
jstr = json.dumps(resp.json())
resp = json.loads(jstr)
ipv4 = resp[0]['Ip'].strip()
port = str(resp[0]['Port']).strip()

setprox = 'var ipport = "' +str(ipv4)+':'+str(port)+'"'
proxypac = ['function FindProxyForURL(url, host) {', setprox,'return "PROXY "+ipport;}']
try:
    pacfile = open('proxy.pac','w')
except:
    print('err1')
    exit()
for src in proxypac:
    pacfile.write(src+"\n")
pacfile.close()
print("proxy.pac updated:")
print(ipv4+':'+port)
exit()


