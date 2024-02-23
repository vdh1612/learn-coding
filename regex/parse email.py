import email.utils 
import re 
names = []
matches = []
for i in range(int(input())):
    name , email = input().split()
    pattern = re.compile(r'<[a-zA-Z]+[a-zA-Z0-9-\._]*@[a-zA-Z]+\.[com|az|in|gt|moc]+>',flags=re.IGNORECASE)
    match = pattern.match(email)
    if match:
        matches.append(email)
        names.append(name)
    else:
        continue
for i in range(len(matches)):
    print(names[i],matches[i])
