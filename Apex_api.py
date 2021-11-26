from pprint import pprint
import json
import requests

# my_api_keyには自分のAPIキーを入力
response = requests.get(
    'https://public-api.tracker.gg/v2/apex/standard/profile/origin/sinkokunoteru' + '?TRN-Api-Key=cc9907f4-0c7e-463e-9c8c-88a24b7ff42b')
# print(response.status_code)  # HTTPのステータスコード取得
# print(response.text)

# そのままだと見にくいのでjsonを整形
json = json.loads(response.text)
# pprint(json)

# statsに主な戦績データが入ってるぽい
# pprint(json['data']['segments'][0]['stats'])
static = json['data']['segments'][0]['stats']

pprint(static['damage']['value'])
pprint(static['rankScore']['metadata']['rankName'])
