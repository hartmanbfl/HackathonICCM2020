#!/usr/bin/env python3

import json
import os
import sqlite3

output_path = os.path.join("..", "..", "Hackathon", "storage", "database", "sqlite.db")
connection = sqlite3.connect(output_path)
c = connection.cursor()


# clean out existing table
c.execute('DELETE FROM conversations')


def write_tree(root, level = 0, conversation_id = 0):
    if not root:
        return
    for branch in root:
        c.execute('INSERT INTO conversations VALUES (?,?,?,?,?)', [None, branch['prompt'], conversation_id, None, None])
        print("{}> {}".format(' '*level*4, branch['prompt']))
        write_tree(branch['children'], level + 1, c.lastrowid)


source_path = os.path.join("..", "..", "dialogs")
for dirpath, dirnames, filenames in os.walk(source_path):
    for filename in [f for f in filenames if f.endswith(".json")]:
        json_path = os.path.join(dirpath, filename)
        print("importing {} ...".format(filename))
        with open(json_path) as json_data:
            data = json.load(json_data)
            write_tree([data])
connection.commit()


rows = c.execute('SELECT id,sentence,conversation_id FROM conversations')
for (row_id, sentence, conversation_id) in rows:
    print("{:>4}: {:>4}    {}".format(row_id, conversation_id, sentence))

