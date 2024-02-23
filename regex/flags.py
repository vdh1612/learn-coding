import re

# Example string
text = """This is a sample text
with multiple lines.
It contains some Numbers like 12345."""

# Case-insensitive search
pattern_case_insensitive = re.compile(r'numbers', re.I)
match_case_insensitive = pattern_case_insensitive.search(text)
print("Case-insensitive search:", match_case_insensitive.group() if match_case_insensitive else "Not found")

# Multi-line search
pattern_multi_line = re.compile(r'^with', re.M)
match_multi_line = pattern_multi_line.search(text)
print("Multi-line search:", match_multi_line.group() if match_multi_line else "Not found")

# Dot-all search
pattern_dot_all = re.compile(r'sample.text', re.S)
match_dot_all = pattern_dot_all.search(text)
print("Dot-all search:", match_dot_all.group() if match_dot_all else "Not found")

# Verbose mode
pattern_verbose = re.compile(r"""
    \b\d+\b    # Match whole numbers
""", re.X)
match_verbose = pattern_verbose.findall(text)
print("Verbose mode:", match_verbose)
