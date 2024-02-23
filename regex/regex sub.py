import re 
texts = []
for i in range(int(input())):
    text = input()
    text = re.sub(r'(?<= )&&(?= )','and',text)
    text = re.sub(r'(?<= )\|\|(?= )','or',text)
    texts.append(text)
for i in texts:
    print(i)
