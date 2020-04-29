import requests
from bs4 import BeautifulSoup

team_url = 'http://ctftime.org/team/50821'
headers = {
    'User-Agent': 'r3billions'
}
r = requests.get(team_url, headers=headers)
soup = BeautifulSoup(r.text, 'html.parser')
rating = soup.find(id='rating_2019')
current_rank = list(map(lambda x : ''.join(x.string.split()), rating.find_all('b')))
print('global rank:', current_rank[0])
#print('country rank:', current_rank[2])
print('overall points:', current_rank[1])

points = []
for row in rating.table.find_all('tr'):
    data = row.find_all('td')
    if len(data) > 1:
        point = data[4].string
        if point is not None:
            points.append(float(point))
points.sort(reverse = True) 

for i in range(10):
    print(str(i + 1) + '-', points[i])