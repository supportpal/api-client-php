import re

MYSQL_PHP_TYPE_MAP = {
    r'\t': '',
    r'tinyint': 'int',
    r'varchar\(.*\)': 'string',
    r' text': ' string',
    r'unsigned': '',
    r'auto_increment': '',
    r'primary key': '',
    r'bigint': 'int',
    r'longtext': 'string',
    r'blob': 'string',
    r'default': '',
    r'collate': '',
    r'utf8_unicode_ci': '',
    r',': '',
    r'\d': '',
    r'not +null': '',
    r'longstring': 'string',
    r'comment .*': '',
    r'\(\)': '',
    r'mediumint': 'int',
    r'`': '',
}

ATTRIBUTE_TEMPLATE = '''/**
* @var {}
* @SerializedName("{}")
*/
private ${};
'''


# credit to: https://stackoverflow.com/a/19053800
def to_camel_case(snake_str):
    components = snake_str.split('_')
    # We capitalize the first letter of each component except the first one
    # with the 'title' method and join them together.
    return components[0] + ''.join(x.title() for x in components[1:])


def parse_attributes(db_string, api_dict):
    # replace mysql types with PHP, remove unneeded attributes (comments, primarykey, default...etc)
    for key, value in MYSQL_PHP_TYPE_MAP.items():
        db_string = re.sub(key, value, db_string)

    # each line contains an attribute from the schema string, split by space, remove spaces.
    remove_lines = db_string.splitlines()
    attributes_dict = {}
    for i in range(len(remove_lines)):
        attribute_list = list(filter(lambda v: v != '', remove_lines[i].split(' ')))
        attributes_dict[attribute_list[0]] = attribute_list
        if attribute_list[0] == 'id':
            attributes_dict[attribute_list[0]].append('None')

    attributes_in_db = set([value[0] for key, value in attributes_dict.items()])
    attributes_in_api = set(api_dict)
    attributes_in_api_not_in_db = attributes_in_api - attributes_in_db

    for key in attributes_in_api.intersection(attributes_in_db):
        v = attributes_dict[key][1:]
        print(ATTRIBUTE_TEMPLATE.format('|'.join(v), key, to_camel_case(key)))

    for key in attributes_in_api_not_in_db:
        print(ATTRIBUTE_TEMPLATE.format('missing_type_fixme', key, to_camel_case(key)))

    values_not_nullable_in_db = [key for key in attributes_in_api.intersection(attributes_in_db) if len(attributes_dict[key]) == 2]
    print(values_not_nullable_in_db)


if __name__ == '__main__':
    json_response_dict = {}
    schema_string = '''
    '''

    parse_attributes(schema_string, json_response_dict.keys())
