# Model Parse Helper

Creating models can be a time-consuming experience. This script is written to help ease that process.
The goal is to provide the script two main pieces of information, and it generates the PHP Model class data attributes.

Required information:
* API JSON response as a Python dict (maximum depth 1 - sub-objects/relations are not supported)
* Database schema as a string

```python
json_response_dict = {
        "id": 23,
        "brand_id": 1,
        "role": 0,
        "firstname": "name1",
        "lastname": "",
        "email": None,
        "confirmed": 0,
        "active": 1,
        "organisation_id": None,
        "organisation_access_level": None,
        "organisation_notifications": None,
}

schema_string = '''id int unsigned auto_increment primary key,
brand_id int unsigned null,
role tinyint default 0 not null,
firstname varchar(45) null,
lastname varchar(45) null,
email varchar(255) collate utf8_unicode_ci null,
password text null,
session varchar(255) null
'''

parse_attributes(schema_string, json_response_dict.keys())
```

In order to run the script you need `Python 3.x`, replace the above variables in the source code then execute the script:
```
python3 main.py >> attributes.txt
```

## Note:

This script is only meant to accelerate the process and is not meant to be comprehensively engineered or robust.
One possible issue you might face is some unhandled MySQL to PHP type mapping. These issues or missing mappings should be solved on occurrence basis. 
