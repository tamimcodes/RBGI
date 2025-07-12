
import sys
global str,char_binary_mapping
char_binary_mapping = {}

#if len(sys.argv) == 2:
filename = sys.argv[1]
file_name = "/opt/lampp/htdocs/rbgi/files/" + filename
print(f"Received argument: {file_name}")
with open(file_name) as file_obj:
    lines = file_obj.readlines()

print(lines)
str = ''
name = lines[0]
print(name)
l = (len(lines))
for i in range(1,l-2,1):
    str += lines[i]
    


class Huffmannode:
    def __init__(self,freq,data,left,right):
        self.freq = freq
        self.data = data
        self.left = left
        self.right = right

def generate_tree(mapping):
    keyset = mapping.keys()
    prioriQ = []
    for c in keyset:
        node = Huffmannode(mapping[c],c,None,None)
        prioriQ.append(node)
        prioriQ = sorted(prioriQ, key=lambda x:x.freq)
    while len(prioriQ) > 1:
        first = prioriQ.pop(0)
        second = prioriQ.pop(0)
        marge_node = Huffmannode(first.freq+second.freq,'#',first,second)
        prioriQ.append(marge_node)
        prioriQ = sorted(prioriQ, key=lambda x: x.freq)
    return prioriQ.pop(0)


def set_binary_code(node, cstr):
    if not node is None:
        if node.left is None and node.right is None:
            char_binary_mapping[node.data] = cstr
            #print(cstr)

        cstr += '0'
        set_binary_code(node.left , cstr)
        cstr = cstr[:-1]

        cstr += '1'
        set_binary_code(node.right ,cstr)
        cstr = cstr[:-1]

def mapping_freq(str):
    mapping = {}
    for i in str:
        if not i in mapping:
            mapping[i] = 1
        else:
            mapping[i] += 1
    return mapping

def encod(str,root,mapping):
    #mapping = mapping_freq(str)
    #root = generate_tree(mapping)
    set_binary_code(root,'')
    print("char | huffman code")
    s = ''
    for c in str:
        s += char_binary_mapping[c]
        #print(c)
    return s

def decode(str,root):
    ans = ''
    curr = root
    n = len(str)
    for i in range(n):
        if str[i] == '0':
            curr = curr.left
        else:
            curr = curr.right
        if curr.left is None and curr.right is None:
            ans += curr.data
            #print(curr.data)
            curr = root
    return ans


mapping = mapping_freq(str)
root = generate_tree(mapping)
encoded_data = encod(str,root,mapping)

file_name = "/opt/lampp/htdocs/rbgi/files/new_"+filename

with open(file_name, 'w') as file_object:
    file_object.write(name)
    file_object.write('\n')
    for char in mapping:
        output_line = f"{char}{char_binary_mapping[char]}\n"
        file_object.write(output_line)
    file_object.write('\n')
    file_object.write(encoded_data)
