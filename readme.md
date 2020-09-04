
Задача: API сервиса менеджмента кальянных

у кальяна может быть настройка - количество трубок, подразумевается что количество пользователей кальяна = количество трубок x 2
Кальян можно забронировать на 30 минут, после чего он снова доступен к новой записи

Условия:

1 Должна быть возможность создания/удаления кальянной (с именем)

- GET api/v1/bars : получаем существующие кальянные

- POST  api/v1/bars : создаем кальянную

- DELETE api/v1/bars/{id} :удаляем кальянную

2 В кальянную можно добавлять и удалять кальяны

- POST  api/v1/hookah-in-bar : добавление  кальяна в кольянную

- DELETE  api/v1/hookah-in-bar/{hookah_id} : удаление кальяна из кальянной

3 Должна быть возможность создания/удаления кальяна (с именем и количеством трубок)

- GET api/v1/hookahs : получаем все кальяны

- POST api/v1/hookahs :  создаем кальян

- DELETE api/v1/hookahs/{id} : удаление кальяна


4 Должна быть возможность забронировать кальян (приготовить) с указанием времени, он будет занят на последующие 30 минут от этого времени,
            при броне указывается имя(на кого) и количество человек (валидировать что нельзя взять кальян с двумя трубками на 6 человек, например);
            для бронирования кальяна необходимо передать свое имя (произвольная строка).
            Не давать бронировать уже забронированное, не давать создавать с тем же именем
            отменить бронь нельзя;

- POST api/v1/booking : создаем бронь кальяна
	
5 Должна быть возможность получить список пользователей, которые забронировали кальяны;

- GET api/v1/booking/active : получаем активные заказы

- GET api/v1/booking/active/{id} : получаем активные заказы в кальянной


6 Должна быть возможность поиска кальяна для брони с указанием диапазона времени (from - to) и количества желаемых мест (нужно вернуть список доступных кальянов)
     при поиске кальянов учитывать кол-во человек, т.е. если человеку нужно 8 мест, нужно вернуть варианты 2 по 4

- GET api/v1/hookahs/find/bar={bar}/from={timeFrom}/to={timeTo}/people={people} : поиск свободных кальянов в кальянной

7 Напиcать тесты на встроенном в laravel phpunit хотя-бы для одного эндпоинта

8 Опишите список созданных эндпоинтов

запуск проекта:
- открыть корень проекта в терминале и запустить команду make build
- затем make up
- swagger по ссылке http://127.0.0.1:8080/api/documentation
- тесты запуск: в корне проекта выполнить команду make test
