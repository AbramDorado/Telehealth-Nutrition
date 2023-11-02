import bcrypt

password = "codeblue128.1".encode('utf-8')
salt = bcrypt.gensalt()
hashed = bcrypt.hashpw(password, salt)

print(hashed.decode('utf-8'))