import logging

data=[]
clean_data=[]
string_data = ""


with open('load_container_front_php.php','r') as fname:
    data=fname.readlines()
    
    for x in data:
        # print(x.strip())
        val=x.strip()
        clean_data.append(val)

for dat in clean_data:
    string_data = string_data + dat  
            
print(string_data)






