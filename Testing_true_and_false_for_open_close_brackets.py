# testing if brackets are true or false

def TestBracketsAreCorrect(request,input_value):
	
	# craeat an empty array
	var = []
	# check the input_value by looping in it
	for x in input_value
		if x in ["(","{, "{"]:
		 # place all these elements in the var
			var.append(x)
		else:
			if not var
				return False
			existing_character = var.pop()
			if existing_character == '(':
				if x != ")":
					return False
			if existing_character == '{':
				if x != "}":
					return False
			if existing_character == '[':
				if x != "]":
					return False
	
	if var:
		return False
	else:
		return True
	