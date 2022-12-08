export class Endereco {
    constructor(
        cep = "",
        logradouro = "",
        bairro = "",
        cidade = "",
        uf = ""
    ) {
        this.cep = cep;
        this.logradouro = logradouro;
        this.bairro = bairro;
        this.cidade = cidade;
        this.uf = uf;
    }
}