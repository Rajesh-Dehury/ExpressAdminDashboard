'''
Purpose : get_charachter for individual student

Input user_id from express_reports
Database tables used express_reports, 
Output lifevitae_characters id
'''

import pymysql
import numpy as np
import sys
import json
user_id = sys.argv[1]


db = pymysql.connect(
                        user = "root",
                        host = "localhost",
                        db = "express_admin_dashboard",
                        password = "",
                        use_unicode = True
                    )
cr = db.cursor()

query_user_chakra = f'SELECT `COGNITIVE`, `INTERACTIVE`, `EMOTIVE`, `ADAPTIVE`, `CREATIVE`, `MOTIVE` FROM express_reports where user_id = {user_id}'
query_characters = 'SELECT `id`, `COGNITIVE`, `INTERACTIVE`, `EMOTIVE`, `ADAPTIVE`, `CREATIVE`, `MOTIVE` FROM `lifevitae_characters`'
_ = cr.execute(query_user_chakra)
record_user = cr.fetchall()

_ = cr.execute(query_characters)
record_characters = cr.fetchall()

if len(record_user) == 0 or len(record_characters) == 0:
    db.close()
    sys.exit(json.dumps({
    "lifevitae_charachter" : None,
}))

temp = []
for id_vec in record_characters:
    temp.append([id_vec[0], id_vec[1:]])

id_score = []
cosine_similarity_lambda = lambda tuple1, tuple2: (np.dot(np.array(tuple1), np.array(tuple2)) / (np.linalg.norm(np.array(tuple1)) * np.linalg.norm(np.array(tuple2))))

for i in temp:
    id_score.append([i[0], cosine_similarity_lambda(i[1], record_user[0])])

print(json.dumps({
    "lifevitae_charachter" : sorted(id_score, key = lambda temp: temp[1], reverse = True)[0][0]
}))
# print("lifevitae_charachter" : sorted(id_score, key = lambda temp: temp[1], reverse = True)[0][0])

db.close()