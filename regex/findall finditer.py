import re

# Input string
input_string = input()

# ?<=[...] đảm bảo chỉ lấy nguyên âm sau 1 phụ âm và ?= sẽ ngược lại 
pattern = re.compile(r'(?<=[qwrtypsdfghjklzxcvbnm])([aeiou]{2,})(?=[qwrtypsdfghjklzxcvbnm])', flags=re.I)

# Using findall to find all matches
matches = pattern.findall(input_string)

if matches:
    for i in matches:
        print(i)
else:
    print("-1")
