document.addEventListener('DOMContentLoaded', function () {
    const dateField = document.getElementById('reservation_date');
    const timeField = document.getElementById('reservation_time');

    // 利用可能時間の定義（昼休み時間13:00-16:30を除外）
    const availableTimes = [
        '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
        '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30'
    ];

    // 時間選択肢を更新する関数
    function updateTimeOptions(selectedDate, reservedTimes = []) {
        if (!timeField) return;

        // 現在の選択値を保存
        const currentValue = timeField.value;
        
        // selectボックスをクリア
        timeField.innerHTML = '<option value="">時間を選択してください</option>';
        
        // 利用可能時間をループして選択肢を追加
        availableTimes.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            
            if (reservedTimes.includes(time)) {
                option.textContent = `${time} (予約済み)`;
                option.disabled = true;
                option.classList.add('text-gray-400');
            } else {
                option.textContent = time;
            }
            
            // 以前の選択値があれば復元（予約済みでない場合のみ）
            if (time === currentValue && !reservedTimes.includes(time)) {
                option.selected = true;
            }
            
            timeField.appendChild(option);
        });
    }

    // 指定日の予約済み時間を取得する関数
    function fetchReservedTimes(date) {
        if (!date) {
            updateTimeOptions(null, []);
            return;
        }

        fetch(`/api/reservations/${date}`)
            .then(response => response.json())
            .then(reservedTimes => {
                updateTimeOptions(date, reservedTimes);
            })
            .catch(() => {
                // エラー時は予約なしとして処理
                updateTimeOptions(date, []);
            });
    }

    // 初期状態で時間選択肢を設定
    updateTimeOptions(null, []);
    
    // 編集画面の場合、初期値で予約済み時間を取得
    if (dateField && dateField.value) {
        fetchReservedTimes(dateField.value);
    }

    // 休診日データを取得してからFlatpickrを初期化
    fetch('/api/holidays')
        .then(response => response.json())
        .then(holidays => {
            flatpickr(dateField, {
                locale: "ja",
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "Y年m月d日",
                minDate: "today",
                disable: [
                    function (date) {
                        return date.getDay() === 0;
                    },
                    ...holidays,
                ],
                // 日付変更時に予約済み時間を取得
                onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0) {
                        fetchReservedTimes(dateStr);
                    } else {
                        updateTimeOptions(null, []);
                    }
                }
            });
        })
        .catch(() => {
            alert('休診日データの取得に失敗しました。管理者にお問い合わせください。');
        });
});