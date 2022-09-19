const loader = (url, element) => {
    fetch(url)
    .then((res)=> {
            if (res.ok){
                return res.text()
            } else{
                throw "Error"
            }
        })
    .then((texto)=> {
            element.innerHTML = " "
            element.innerHTML = texto
        })
    .catch((err)=>{console.log(err)})
}

const onClickLoadInsumos = () => {

}
