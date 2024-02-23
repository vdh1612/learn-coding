import re

check_valid = []
for i in range(int(input())):
    input_str = input()
    if len(input_str) == 10:
        if len(set(input_str)) != len(input_str):
            check_valid.append('Invalid')
        elif not re.match(r'^[a-zA-Z0-9]+$',input_str):
            check_valid.append('Invalid')
        elif len(re.findall(r'[A-Z]', input_str)) >= 2 and len(re.findall(r'[0-9]', input_str)) >= 3:
            check_valid.append('Valid')
        else:
            check_valid.append('Invalid')
    else:
        check_valid.append('Invalid')
for i in check_valid:
    print(i)
