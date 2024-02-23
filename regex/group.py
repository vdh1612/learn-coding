import re

matches = re.search(r"([A-Za-z0-9])\1+", input())
print(matches)
if matches:
    print(matches.group(0))
else:
    print(-1)
# The expression ([A-Za-z0-9]) will match an alphanumeric character and store it in group .
# The expression \1 matches the exact same text that was matched by the first capturing group.