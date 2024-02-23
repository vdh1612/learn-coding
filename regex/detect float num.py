import re

T = int(input())
for i in range(T):
    if bool(re.search(r"^[+-]?\d*\.\d+$", input())):
        print(True)
    else:
        print(False)

# We can use ^[+-]?\d*\.\d+$.

# Explanation:

# Let X be the floating point number we want to match. Then:

# ^ = the start of X.

# [+-]? = optional, either + or -.
# \d* = zero or more digits.
# \. = . symbol.
# \d+ = one or more digits.
# $ = end of X.