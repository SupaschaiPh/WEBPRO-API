import requests
tableUser = [{
    "role": "table",
    "id": "2024-03-08-11-47-49-0349-65eafae5bdaca",
    "email": "table3@sooksanhotpot",
    "password": "table3@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-47-55-0355-65eafaeb0a3c9",
    "email": "table4@sooksanhotpot",
    "password": "table4@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-03-0303-65eafaf3c054b",
    "email": "table5@sooksanhotpot",
    "password": "table5@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-09-0309-65eafaf962a19",
    "email": "table6@sooksanhotpot",
    "password": "table6@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-17-0317-65eafb0128a31",
    "email": "table7@sooksanhotpot",
    "password": "table7@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-23-0323-65eafb078e1bb",
    "email": "table8@sooksanhotpot",
    "password": "table8@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-30-0330-65eafb0e49163",
    "email": "table9@sooksanhotpot",
    "password": "table9@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
},
    {
    "role": "table",
    "id": "2024-03-08-11-48-38-0338-65eafb165e86f",
    "email": "table10@sooksanhotpot",
    "password": "table10@sooksanhotpot",
    "name": "table",
    "lastname": "g11hotpot",
    "tel": None,
    "active": "1",
    "role_desc": "โต๊ะ"
}
]
axios = requests.Session()
for i,x in enumerate(tableUser):
    res = axios.post(
        "http://localhost:8080/v1/employee/add/",
        {
            "id": x["id"],
            "name": "table"+str(i+3),
            "lastname": "table@sooksanHp",
            "address": "sooksan hotpot",
            "duty": "service"
        }
    )
