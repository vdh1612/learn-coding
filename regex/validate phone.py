import re  

matches = []
for i in range(int(input())):
    str_input = input()
    pattern = re.compile(r'(^[789])([0-9]{9}$)')
    match = pattern.match(str_input)
    if match:
        matches.append("YES")
    else:
        matches.append("NO")

for match in matches:
    print(match)
