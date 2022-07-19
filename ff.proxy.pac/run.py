#!/bin/python3.9
import os,requests,json,sys,urllib.request,socket,subprocess,shlex,time 
import subprocess as spr

#global xp, chp, pkill

#xp=0
#pkill=0


def newProxy():
    #url = 'https://www.proxyscan.io/api/proxy?ping=50&limit=1&type=http,https'
    url = 'https://www.proxyscan.io/api/proxy?level=anonymous&ping=40&format=json'
    # api req to get a proxy json, change ping value up if empty resp
    resp = requests.get(url)
    #print(resp.json())
    jstr = json.dumps(resp.json())
    resp = json.loads(jstr)
    ipv4 = resp[0]['Ip'].strip()
    stype = str(resp[0]['Type'][0]).strip()
    port = str(resp[0]['Port']).strip()
    proxy=str(ipv4)+":"+str(port)
    # eg: --proxy-server="https=proxy1:80;http=socks4://baz:1080"
    #oip=requests.get("https://cleanip.xyz")
    #print('public ip: ',oip.text)
    #print(stype+' proxy ',proxy)
    return [proxy,stype]

def chromi(proxy):
    stype=proxy[1]
    chrun='chromium --temp-profile --proxy-server="https='+stype.lower()+'://'+proxy[0]+';http='+stype.lower()+'://'+proxy[0]+'" https://cleanip.xyz'
    print(chrun)
    args = shlex.split(chrun)
        #rets = subprocess.run([chrun + " /dev/null"], capture_output=True)
    ret=0
    try:
        ret = subprocess.Popen(args)
    except:
        print('err.c38 ')
        
    return ret
    

def menu(xp):
    os.system('clear')
    print("#"*50)
    print(str(xp)+ " procs running")
    print("inputs\nc\t exec chromium->proc(rand(proxy))\nk\tkills proc[0]\nq\tquitt\n")
    print('#'*50)

def cleanup(mode,xp,chp):

    if mode==0:
        while xp >= 0:
            chp[xp].terminate()
            xp-=1
        os.system('rm -rf /tmp/tmp.*')
        sys.exit('\nbye')

    if mode==1:
        print(chp[xp-1].terminate())
        xp-=1
        return xp
    return 0

def main():
    cv = input('set bin to use\nc\tchrome\ni\tchromeium')
    if cv == 'c':
        child = spr.Popen(), stdout=sp.PIPE)
    xp=0
    pkill=0
    chp=[]
    while True:
        menu(xp)
        ui=input('>>')
        
        if str(ui) == 'c':
            try:
                proxy = newProxy()
            except:
                print('err.p1')
            try:  
                tp=chromi(proxy)
                if tp != 0:
                    xp+=1
                    chp.append(tp)
            except:
                print("err.r74")
    
            time.sleep(3)
    
        if str(ui) == 'k':
            if xp>=1:
                xp = cleanup(1,xp,chp)
            else:
                print('>> nothing to kill')
                time.sleep(3)
        if str(ui) == 'q':
            cleanup(0,xp,chp)
        


if __name__ == '__main__':
    main()

