import React from "react";

const TransferList = ({ transfers }) => (
    <table className="table">
        <tbody>
            {transfers.map(transfer => (
                <tr key={transfer.id}>
                    <td>{transfer.description}</td>
                    <td className={transfer.amount > 0 ? 'text-success':'text-danger'} >

                    </td>
                    <td>{transfer.amount}</td>
                </tr>
            ))}
        </tbody>
    </table>
);

export default TransferList;
