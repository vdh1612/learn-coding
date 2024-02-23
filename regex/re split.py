regex_pattern = r"[,.]"	# Do not delete 'r'.

import re
print("\n".join(re.split(regex_pattern, input())))

# Input (stdin)
# 100,000,000.000
# Your Output (stdout)
# 100
# 000
# 000
# 000
# Expected Output
# 100
# 000
# 000
# 000