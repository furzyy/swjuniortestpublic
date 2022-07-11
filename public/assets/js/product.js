class Product
{
    postData(data) {
        fetch('delete-products', {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json()
        }).
        then(function (response) {
            if (response) {
                const dataLength = Object.keys(data['productIds']).length
                for (let i = 0; i < dataLength; i++) {
                    let id = data['productIds'][i]
                    document.getElementById(id).remove()
                }
            }
        });
    }

    delete() {
        const checkboxes = document.getElementsByClassName('delete-checkbox')
        const checkboxesLength = checkboxes.length

        let productIds = []
        for (let i = 0; i < checkboxesLength; i++) {
            let checkbox = checkboxes[i]
            if (checkbox.checked) {
                productIds.push(checkbox.value)
            }
        }

        this.postData({'productIds': productIds})
    }

    typeSwitch(productName) {
        let productNames = ['dvd', 'furniture', 'book']
        for (const productKey in productNames) {
            let element = document.getElementById(productNames[productKey])
            element.classList.remove('show')
        }

        let element = document.getElementById(productName)
        element.classList.add('show')
    }
}

